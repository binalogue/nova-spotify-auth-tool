<?php

use Illuminate\Support\Facades\Route;
use Binalogue\SpotifyAuthTool\Http\Controllers\SpotifyUserController;

/*
|--------------------------------------------------------------------------
| Tool API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your tool. These routes
| are loaded by the ServiceProvider of your tool. They are protected
| by your tool's "Authorize" middleware by default. Now, go build!
|
*/

Route::get('/spotify-users/{user}', SpotifyUserController::class.'@show');
Route::post('/spotify-users', SpotifyUserController::class.'@store');
