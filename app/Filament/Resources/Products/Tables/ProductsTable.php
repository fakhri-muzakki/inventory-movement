<?php

namespace App\Filament\Resources\Products\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_url')
                    ->label('Image')
                    ->square()
                    ->defaultImageUrl(env("DEFAULT_PRODUCT_IMAGE"))
                    ->toggleable(isToggledHiddenByDefault: false),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('category.name')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),
                TextColumn::make('supplier.name')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),
                TextColumn::make('sku')
                    ->label('SKU')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false),
                TextColumn::make('stock')
                    ->badge()
                    ->color(function ($record) {

                        return $record->stock <= $record->minimum_stock
                            ? 'danger'
                            : 'success';
                    }),
                TextColumn::make('minimum_stock')
                    ->numeric()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                TextColumn::make('price')
                    ->money("IDR")
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->sortable(),
                IconColumn::make('is_active')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->relationship(
                        'category',
                        'name'
                    ),

                SelectFilter::make('supplier')
                    ->relationship(
                        'supplier',
                        'name'
                    ),

                Filter::make('low_stock')
                    ->query(
                        fn($query) =>
                        $query->whereColumn(
                            'stock',
                            '<=',
                            'minimum_stock'
                        )
                    )
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
                Action::make('stock_in')
                    ->label('Stock In')
                    ->form([

                        TextInput::make('quantity')
                            ->numeric()
                            ->required()
                            ->minValue(1),

                        Textarea::make('notes'),

                    ])
                    ->action(function (
                        array $data,
                        $record
                    ) {

                        DB::transaction(function () use (
                            $data,
                            $record
                        ) {

                            $record->increment(
                                'stock',
                                $data['quantity']
                            );

                            $record
                                ->stockMovements()
                                ->create([

                                    'user_id' => Auth::id(),

                                    'type' => 'in',

                                    'quantity' => $data['quantity'],

                                    'notes' => $data['notes'],

                                ]);
                        });
                    }),

                Action::make('stock_out')
                    ->label('Stock Out')
                    ->form([

                        TextInput::make('quantity')
                            ->numeric()
                            ->required()
                            ->minValue(1),

                        Textarea::make('notes'),

                    ])
                    ->action(function (
                        array $data,
                        $record
                    ) {

                        if (
                            $record->stock <
                            $data['quantity']
                        ) {

                            Notification::make()
                                ->danger()
                                ->title(
                                    'Insufficient stock.'
                                )
                                ->send();

                            return;
                        }

                        DB::transaction(function () use (
                            $data,
                            $record
                        ) {

                            $record->decrement(
                                'stock',
                                $data['quantity']
                            );

                            $record
                                ->stockMovements()
                                ->create([

                                    'user_id' => Auth::id(),

                                    'type' => 'out',

                                    'quantity' => $data['quantity'],

                                    'notes' => $data['notes'],

                                ]);
                        });
                    }),

            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
