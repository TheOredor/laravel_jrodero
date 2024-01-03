<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

$files = glob(__DIR__ . '/api/*.routes.php');
foreach ($files as $file) {
    $routeFileName = basename($file);
    $prefix = explode('.', $routeFileName)[0];

    Route::prefix($prefix)->group($file);
}