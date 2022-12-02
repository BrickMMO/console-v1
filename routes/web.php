<?php

use App\Http\Controllers\BrainController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\HubController;
use App\Http\Controllers\HubFunctionController;
use App\Http\Controllers\HubPortController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\UserController;

Use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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

Route::get('/logout', [ConsoleController::class, 'logout'])->middleware('auth');
Route::get('/', [ConsoleController::class, 'loginForm'])->middleware('guest')->name('login');
Route::post('/', [ConsoleController::class, 'login'])->middleware('guest');
Route::get('/dashboard', [ConsoleController::class, 'dashboard'])->middleware('auth')->name('dashboard');

Route::get('/users/list', [UserController::class, 'list'])->middleware('auth');
Route::get('/users/add', [UserController::class, 'addForm'])->middleware('auth');
Route::post('/users/add', [UserController::class, 'add'])->middleware('auth');
Route::get('/users/edit/{user:id}', [UserController::class, 'editForm'])->where('user', '[0-9]+')->middleware('auth');
Route::post('/users/edit/{user:id}', [UserController::class, 'edit'])->where('user', '[0-9]+')->middleware('auth');
Route::get('/users/delete/{user:id}', [UserController::class, 'delete'])->where('user', '[0-9]+')->middleware('auth');

Route::get('/maps/list', [MapController::class, 'list'])->middleware('auth');
Route::get('/maps/add', [MapController::class, 'addForm'])->middleware('auth');
Route::post('/maps/add', [MapController::class, 'add'])->middleware('auth');
Route::get('/maps/edit/{map:id}', [MapController::class, 'editForm'])->where('map', '[0-9]+')->middleware('auth');
Route::post('/maps/edit/{map:id}', [MapController::class, 'edit'])->where('map', '[0-9]+')->middleware('auth');
Route::get('/maps/delete/{map:id}', [MapController::class, 'delete'])->where('map', '[0-9]+')->middleware('auth');
Route::get('/maps/view/{map:id}', [MapController::class, 'view'])->where('map', '[0-9]+')->middleware('auth');
Route::get('/maps/types/{map:id}', [MapController::class, 'typesForm'])->where('map', '[0-9]+')->middleware('auth');
Route::post('/maps/types/{map:id}', [MapController::class, 'types'])->where('map', '[0-9]+')->middleware('auth');

Route::get('/buildings/list', [BuildingController::class, 'list'])->middleware('auth');
Route::get('/buildings/add', [BuildingController::class, 'addForm'])->middleware('auth');
Route::post('/buildings/add', [BuildingController::class, 'add'])->middleware('auth');
Route::get('/buildings/edit/{building:id}', [BuildingController::class, 'editForm'])->where('building', '[0-9]+')->middleware('auth');
Route::post('/buildings/edit/{building:id}', [BuildingController::class, 'edit'])->where('building', '[0-9]+')->middleware('auth');
Route::get('/buildings/delete/{building:id}', [BuildingController::class, 'delete'])->where('building', '[0-9]+')->middleware('auth');
Route::get('/buildings/delete/image/{building:id}', [BuildingController::class, 'deleteImage'])->where('building', '[0-9]+')->middleware('auth');
Route::get('/buildings/image/{building:id}', [BuildingController::class, 'imageForm'])->where('building', '[0-9]+')->middleware('auth');
Route::post('/buildings/image/{building:id}', [BuildingController::class, 'image'])->where('building', '[0-9]+')->middleware('auth');
Route::get('/buildings/squares/{building:id}', [BuildingController::class, 'squaresForm'])->where('building', '[0-9]+')->middleware('auth');
Route::post('/buildings/squares/{building:id}', [BuildingController::class, 'squares'])->where('building', '[0-9]+')->middleware('auth');

Route::get('/places/list', [PlaceController::class, 'list'])->middleware('auth');
Route::get('/places/add', [PlaceController::class, 'addForm'])->middleware('auth');
Route::post('/places/add', [PlaceController::class, 'add'])->middleware('auth');
Route::get('/places/edit/{building:id}', [PlaceController::class, 'editForm'])->where('place', '[0-9]+')->middleware('auth');
Route::post('/places/edit/{building:id}', [PlaceController::class, 'edit'])->where('place', '[0-9]+')->middleware('auth');
Route::get('/places/delete/{building:id}', [PlaceController::class, 'delete'])->where('place', '[0-9]+')->middleware('auth');

Route::get('/brains/list', [BrainController::class, 'list'])->middleware('auth');
Route::get('/brains/add', [BrainController::class, 'addForm'])->middleware('auth');
Route::post('/brains/add', [BrainController::class, 'add'])->middleware('auth');
Route::get('/brains/edit/{brain:id}', [BrainController::class, 'editForm'])->where('brain', '[0-9]+')->middleware('auth');
Route::post('/brains/edit/{brain:id}', [BrainController::class, 'edit'])->where('brain', '[0-9]+')->middleware('auth');
Route::get('/brains/delete/{brain:id}', [BrainController::class, 'delete'])->where('brain', '[0-9]+')->middleware('auth');
Route::get('/brains/ports/{brain:id}', [BrainController::class, 'portsForm'])->where('brain', '[0-9]+')->middleware('auth');
Route::post('/brains/ports/{brain:id}', [BrainController::class, 'ports'])->where('brain', '[0-9]+')->middleware('auth');
Route::get('/brains/json/{brain:id}', [BrainController::class, 'jsonForm'])->where('brain', '[0-9]+')->middleware('auth');
Route::post('/brains/json/{brain:id}', [BrainController::class, 'json'])->where('brain', '[0-9]+')->middleware('auth');
Route::get('/brains/settings/{brain:id}', [BrainController::class, 'settingsForm'])->where('brain', '[0-9]+')->middleware('auth');
Route::post('/brains/settings/{brain:id}', [BrainController::class, 'settings'])->where('brain', '[0-9]+')->middleware('auth');

Route::get('/hubs/list', [HubController::class, 'list'])->middleware('auth');
Route::get('/hubs/add', [HubController::class, 'addForm'])->middleware('auth');
Route::post('/hubs/add', [HubController::class, 'add'])->middleware('auth');
Route::get('/hubs/edit/{hub:id}', [HubController::class, 'editForm'])->where('hub', '[0-9]+')->middleware('auth');
Route::post('/hubs/edit/{hub:id}', [HubController::class, 'edit'])->where('hub', '[0-9]+')->middleware('auth');
Route::get('/hubs/delete/{hub:id}', [HubController::class, 'delete'])->where('hub', '[0-9]+')->middleware('auth');
Route::get('/hubs/delete/image/{hub:id}', [HubController::class, 'deleteImage'])->where('hub', '[0-9]+')->middleware('auth');
Route::get('/hubs/image/{hub:id}', [HubController::class, 'imageForm'])->where('hub', '[0-9]+')->middleware('auth');
Route::post('/hubs/image/{hub:id}', [HubController::class, 'image'])->where('hub', '[0-9]+')->middleware('auth');

Route::get('/hubs/ports/list', [HubPortController::class, 'list'])->middleware('auth');
Route::get('/hubs/ports/add', [HubPortController::class, 'addForm'])->middleware('auth');
Route::post('/hubs/ports/add', [HubPortController::class, 'add'])->middleware('auth');
Route::get('/hubs/ports/edit/{hubPort:id}', [HubPortController::class, 'editForm'])->where('hubPort', '[0-9]+')->middleware('auth');
Route::post('/hubs/ports/edit/{hubPort:id}', [HubPortController::class, 'edit'])->where('brainhubPortPort', '[0-9]+')->middleware('auth');
Route::get('/hubs/ports/delete/{hubPort:id}', [HubPortController::class, 'delete'])->where('hubPort', '[0-9]+')->middleware('auth');
Route::get('/hubs/ports/delete/image/{hubPort:id}', [HubPortController::class, 'deleteImage'])->where('hubPort', '[0-9]+')->middleware('auth');

Route::get('/hubs/functions/list', [HubFunctionController::class, 'list'])->middleware('auth');
Route::get('/hubs/functions/add', [HubFunctionController::class, 'addForm'])->middleware('auth');
Route::post('/hubs/functions/add', [HubFunctionController::class, 'add'])->middleware('auth');
Route::get('/hubs/functions/edit/{hubFunction:id}', [HubFunctionController::class, 'editForm'])->where('hubFunction', '[0-9]+')->middleware('auth');
Route::post('/hubs/functions/edit/{hubFunction:id}', [HubFunctionController::class, 'edit'])->where('hubFunction', '[0-9]+')->middleware('auth');
Route::get('/hubs/functions/delete/{hubFunction:id}', [HubFunctionController::class, 'delete'])->where('hubFunction', '[0-9]+')->middleware('auth');
Route::get('/hubs/functions/delete/image/{hubFunction:id}', [HubFunctionController::class, 'deleteImage'])->where('hubFunction', '[0-9]+')->middleware('auth');

if (env('APP_ENV') === 'production' && !request()->secure()) {
    // URL::forceScheme('https');
    // Redirect::route('dashboard');
}