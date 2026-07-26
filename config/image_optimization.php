<?php

return [
    'enabled' => env('IMAGE_OPTIMIZATION_ENABLED', true),

    'allowed_types' => [
        'image/jpeg',
        'image/png',
        'image/webp',
    ],

    'max_size_kb' => env('IMAGE_MAX_SIZE_KB', 2048), // 2MB

    'generated_sizes' => [
        'thumbnail' => ['width' => 150, 'height' => 150, 'fit' => 'crop'],
        'medium' => ['width' => 400, 'height' => 400, 'fit' => 'contain'],
        'large' => ['width' => 1200, 'height' => 800, 'fit' => 'contain'],
    ],

    'quality' => env('IMAGE_QUALITY', 85),
];