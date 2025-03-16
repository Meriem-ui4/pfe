<?php

use Illuminate\Support\Facades\Route;

Route::middleware('api')->get('/user', function () {
    return 'API Working';
});
