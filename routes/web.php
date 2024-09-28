<?php

use Illuminate\Support\Facades\Route;
use Statamic\Facades\Entry;

Route::get('/', function () {
    // Query for the entry using Eloquent's where method
    $data = Entry::query()
        ->where('slug', 'home')
        ->where('collection', 'pages') // Assuming 'pages' is the collection name
        ->first(); // Fetch the first matching entry

    if (!$data) {
    abort(404, 'Home is niet gevonden');
    }

    return view('home', ['data' => $data]);
});

Route::get('/contact', function () {
        // Query for the entry using Eloquent's where method
    $data = Entry::query()
        ->where('slug', 'contact')
        ->where('collection', 'pages') // Assuming 'pages' is the collection name
        ->first(); // Fetch the first matching entry

    if (!$data) {
    abort(404, 'Contact is niet gevonden');
    }
    return view('contact', ['data' => $data]);
});

Route::get('/over-ons', function () {
    $data = Entry::query()
        ->where('slug', 'over-ons')
        ->where('collection', 'pages') // Assuming 'pages' is the collection name
        ->first(); // Fetch the first matching entry

    if (!$data) {
    abort(404, 'Over ons is niet gevonden');
    }
    return view('over-ons', ['data' => $data]);
});
