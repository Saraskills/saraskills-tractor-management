<?php

use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function () {
    Route::view('/{any?}', 'app')->where('any', '^(?!api).*$');
});
