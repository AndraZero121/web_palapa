<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Website Settings
    |--------------------------------------------------------------------------
    |
    | These settings are stored in the database and can be changed
    | through the admin panel.
    |
    */

    'default_settings' => [
        'site_name' => 'SMK Palapa Semarang',
        'site_description' => 'SMK Palapa Semarang - Sekolah Menengah Kejuruan Terbaik',
        'address' => 'Jl. Contoh No. 123, Semarang',
        'phone' => '024-1234567',
        'email' => 'info@smkpalapa.sch.id',
        'facebook' => 'https://facebook.com/smkpalapasemarang',
        'instagram' => 'https://instagram.com/smkpalapasemarang',
        'youtube' => 'https://youtube.com/smkpalapasemarang',
        'map_embed' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15840.876885616244!2d110.41345561853256!3d-6.982620458469695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b4e13a8f3e5%3A0x4077d06bea8fde39!2sSMK%20Palapa%20Semarang!5e0!3m2!1sen!2sid!4v1618238475183!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>'
    ],

    /*
    |--------------------------------------------------------------------------
    | Image Settings
    |--------------------------------------------------------------------------
    |
    | These settings define the default image sizes and quality for uploads.
    |
    */

    'images' => [
        'news_thumbnail' => [
            'width' => 300,
            'height' => 200,
        ],
        'gallery_thumbnail' => [
            'width' => 300,
            'height' => 200,
        ],
        'gallery_large' => [
            'width' => 800,
            'height' => 600,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Pagination Settings
    |--------------------------------------------------------------------------
    |
    | These settings define the default pagination for different sections.
    |
    */

    'pagination' => [
        'news' => 9,
        'gallery' => 12,
        'admin' => 10,
    ],
];