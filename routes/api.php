<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\API\RegistrationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [RegistrationController::class, 'registerUser']);
Route::post('login', [RegistrationController::class, 'loginUser']);

Route::get('/test', function(Request $request){
    return 'authenticated';
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/apilist', [PeopleController::class, 'allList']);

// Route::post('login', [PeopleController::class, 'login']);
// Route::post('register', [PeopleController::class, 'register']);
// Route::group(['middleware' => 'auth:api'], function(){
// Route::post('details', 'API\UserController@details');
// });