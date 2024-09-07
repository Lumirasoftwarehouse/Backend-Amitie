<?php

use Illuminate\Support\Facades\Route;

// route Vue.js
Route::get('/{any?}', function () {
    return view('admin');
})->where('any', '.*');