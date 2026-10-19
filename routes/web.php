<?php

use Illuminate\Support\Facades\Route;

// Sitemap voor zoekmachines met alle gepubliceerde pagina's en diensten.
Route::statamic('sitemap.xml', 'sitemap', [
    'layout' => null,
    'content_type' => 'application/xml',
]);
