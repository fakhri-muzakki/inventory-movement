<?php

namespace App\Services;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class CloudinaryService
{
    public function upload(string $path): array
    {
        $result = Cloudinary::uploadApi()->upload($path);

        return [
            'url' => $result['secure_url'],
            'public_id' => $result['public_id'],
        ];
    }
}
