<?php

namespace App\Filament\Resources\Products\Pages;

use App\Filament\Resources\Products\ProductResource;
use App\Models\Product;
use App\Services\CloudinaryService;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;


class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    protected function handleRecordCreation(
        array $data
    ): Product {

        if (! empty($data['uploaded_image'])) {

            $localPath = Storage::disk('local')->path(
                $data['uploaded_image']
            );

            $cloudinary =
                app(CloudinaryService::class);

            $image =
                $cloudinary->upload(
                    $localPath
                );

            $data['image_url'] =
                $image['url'];

            $data['image_public_id'] =
                $image['public_id'];

            Storage::disk('local')->delete(
                $data['uploaded_image']
            );
        }

        unset($data['uploaded_image']);

        return Product::create($data);
    }
}
