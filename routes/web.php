<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\AccessTokenController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('count', function (Request $request) {
    return response()->json([
        'message' => $request->get('message'),
    ]);
});

Route::prefix('api/v1/')->group(function () {
    Route::get('access_token', [AccessTokenController::class, 'generate_token']);
});

// Default route
/* Route::fallback(function () {
    return view('welcome');
}); */
