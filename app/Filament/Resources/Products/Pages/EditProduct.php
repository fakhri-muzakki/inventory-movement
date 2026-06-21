<?php

namespace App\Filament\Resources\Products\Pages;

use App\Filament\Resources\Products\ProductResource;
use App\Models\Product;
use App\Services\CloudinaryService;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Override;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    #[Override]
    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        if (! empty($data['uploaded_image'])) {

            if ($record->image_public_id) {

                Cloudinary::uploadApi()->destroy(
                    $record->image_public_id
                );
            }

            $localPath = storage_path(
                'app/private/' . $data['uploaded_image']
            );

            $image = app(CloudinaryService::class)
                ->upload($localPath);

            $data['image_url'] = $image['url'];

            $data['image_public_id'] = $image['public_id'];
        }

        unset($data['uploaded_image']);
        $record->update($data);
        return $record;
    }
}
