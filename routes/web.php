<?php

use App\Http\Controllers\BrainController;
use App\Http\Controllers\BrainFunctionController;
use App\Http\Controllers\BrainTypeController;
use App\Http\Controllers\BrainPortController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleTypeController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\ToolTypeController;
use App\Http\Controllers\TopicController;

use Illuminate\Support\Facades\Route;

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
Route::get('/dashboard', [ConsoleController::class, 'dashboard'])->middleware('auth');

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

Route::get('/brains/list', [BrainController::class, 'list'])->middleware('auth');
Route::get('/brains/add', [BrainController::class, 'addForm'])->middleware('auth');
Route::post('/brains/add', [BrainController::class, 'add'])->middleware('auth');
Route::get('/brains/edit/{brain:id}', [BrainController::class, 'editForm'])->where('brain', '[0-9]+')->middleware('auth');
Route::post('/brains/edit/{brain:id}', [BrainController::class, 'edit'])->where('brain', '[0-9]+')->middleware('auth');
Route::get('/brains/delete/{brain:id}', [BrainController::class, 'delete'])->where('brain', '[0-9]+')->middleware('auth');
Route::get('/brains/ports/{brain:id}', [BrainController::class, 'portsForm'])->where('brain', '[0-9]+')->middleware('auth');
Route::post('/brains/ports/{brain:id}', [BrainController::class, 'ports'])->where('brain', '[0-9]+')->middleware('auth');

Route::get('/brains/types/list', [BrainTypeController::class, 'list'])->middleware('auth');
Route::get('/brains/types/add', [BrainTypeController::class, 'addForm'])->middleware('auth');
Route::post('/brains/types/add', [BrainTypeController::class, 'add'])->middleware('auth');
Route::get('/brains/types/edit/{brainType:id}', [BrainTypeController::class, 'editForm'])->where('brainType', '[0-9]+')->middleware('auth');
Route::post('/brains/types/edit/{brainType:id}', [BrainTypeController::class, 'edit'])->where('brainType', '[0-9]+')->middleware('auth');
Route::get('/brains/types/delete/{brainType:id}', [BrainTypeController::class, 'delete'])->where('brainType', '[0-9]+')->middleware('auth');
Route::get('/brains/types/delete/image/{brainType:id}', [BrainTypeController::class, 'deleteImage'])->where('brainType', '[0-9]+')->middleware('auth');
Route::get('/brains/types/image/{brainType:id}', [BrainTypeController::class, 'imageForm'])->where('brainType', '[0-9]+')->middleware('auth');
Route::post('/brains/types/image/{brainType:id}', [BrainTypeController::class, 'image'])->where('brainType', '[0-9]+')->middleware('auth');

Route::get('/brains/ports/list', [BrainPortController::class, 'list'])->middleware('auth');
Route::get('/brains/ports/add', [BrainPortController::class, 'addForm'])->middleware('auth');
Route::post('/brains/ports/add', [BrainPortController::class, 'add'])->middleware('auth');
Route::get('/brains/ports/edit/{brainPort:id}', [BrainPortController::class, 'editForm'])->where('brainPort', '[0-9]+')->middleware('auth');
Route::post('/brains/ports/edit/{brainPort:id}', [BrainPortController::class, 'edit'])->where('brainPort', '[0-9]+')->middleware('auth');
Route::get('/brains/ports/delete/{brainPort:id}', [BrainPortController::class, 'delete'])->where('brainPort', '[0-9]+')->middleware('auth');
Route::get('/brains/ports/delete/image/{brainPort:id}', [BrainPortController::class, 'deleteImage'])->where('brainPort', '[0-9]+')->middleware('auth');

Route::get('/brains/functions/list', [BrainFunctionController::class, 'list'])->middleware('auth');
Route::get('/brains/functions/add', [BrainFunctionController::class, 'addForm'])->middleware('auth');
Route::post('/brains/functions/add', [BrainFunctionController::class, 'add'])->middleware('auth');
Route::get('/brains/functions/edit/{brainFunction:id}', [BrainFunctionController::class, 'editForm'])->where('brainFunction', '[0-9]+')->middleware('auth');
Route::post('/brains/functions/edit/{brainFunction:id}', [BrainFunctionController::class, 'edit'])->where('brainFunction', '[0-9]+')->middleware('auth');
Route::get('/brains/functions/delete/{brainFunction:id}', [BrainFunctionController::class, 'delete'])->where('brainFunction', '[0-9]+')->middleware('auth');
Route::get('/brains/functions/delete/image/{brainFunction:id}', [BrainFunctionController::class, 'deleteImage'])->where('brainFunction', '[0-9]+')->middleware('auth');










Route::get('/evaluations/list', [EvaluationController::class, 'list'])->middleware('auth');
Route::get('/evaluations/add', [EvaluationController::class, 'addForm'])->middleware('auth');
Route::post('/evaluations/add', [EvaluationController::class, 'add'])->middleware('auth');
Route::get('/evaluations/edit/{evaluation:id}', [EvaluationController::class, 'editForm'])->where('evaluation', '[0-9]+')->middleware('auth');
Route::post('/evaluations/edit/{evaluation:id}', [EvaluationController::class, 'edit'])->where('evaluation', '[0-9]+')->middleware('auth');
Route::get('/evaluations/delete/{evaluation:id}', [EvaluationController::class, 'delete'])->where('evaluation', '[0-9]+')->middleware('auth');

Route::get('/memes/tags/list', [TagController::class, 'list'])->middleware('auth');
Route::get('/memes/tags/add', [TagController::class, 'addForm'])->middleware('auth');
Route::post('/memes/tags/add', [TagController::class, 'add'])->middleware('auth');
Route::get('/memes/tags/edit/{tag:id}', [TagController::class, 'editForm'])->where('tag', '[0-9]+')->middleware('auth');
Route::post('/memes/tags/edit/{tag:id}', [TagController::class, 'edit'])->where('tag', '[0-9]+')->middleware('auth');
Route::get('/memes/tags/delete/{tag:id}', [TagController::class, 'delete'])->where('tag', '[0-9]+')->middleware('auth');

Route::get('/topics/list', [TopicController::class, 'list'])->middleware('auth');
Route::get('/topics/add', [TopicController::class, 'addForm'])->middleware('auth');
Route::post('/topics/add', [TopicController::class, 'add'])->middleware('auth');
Route::get('/topics/edit/{topic:id}', [TopicController::class, 'editForm'])->where('topic', '[0-9]+')->middleware('auth');
Route::post('/topics/edit/{topic:id}', [TopicController::class, 'edit'])->where('topic', '[0-9]+')->middleware('auth');
Route::get('/topics/delete/{topic:id}', [TopicController::class, 'delete'])->where('topic', '[0-9]+')->middleware('auth');
Route::get('/topics/delete/image/{topic:id}', [TopicController::class, 'deleteImage'])->where('topic', '[0-9]+')->middleware('auth');
Route::get('/topics/image/{topic:id}', [TopicController::class, 'imageForm'])->where('topic', '[0-9]+')->middleware('auth');
Route::post('/topics/image/{topic:id}', [TopicController::class, 'image'])->where('topic', '[0-9]+')->middleware('auth');
Route::get('/topics/delete/banner/{topic:id}', [TopicController::class, 'deleteBanner'])->where('topic', '[0-9]+')->middleware('auth');
Route::get('/topics/banner/{topic:id}', [TopicController::class, 'bannerForm'])->where('topic', '[0-9]+')->middleware('auth');
Route::post('/topics/banner/{topic:id}', [TopicController::class, 'banner'])->where('topic', '[0-9]+')->middleware('auth');

Route::get('/socials/list', [SocialController::class, 'list'])->middleware('auth');
Route::get('/socials/add', [SocialController::class, 'addForm'])->middleware('auth');
Route::post('/socials/add', [SocialController::class, 'add'])->middleware('auth');
Route::get('/socials/edit/{social:id}', [SocialController::class, 'editForm'])->where('social', '[0-9]+')->middleware('auth');
Route::post('/socials/edit/{social:id}', [SocialController::class, 'edit'])->where('social', '[0-9]+')->middleware('auth');
Route::get('/socials/delete/{social:id}', [SocialController::class, 'delete'])->where('social', '[0-9]+')->middleware('auth');
Route::get('/socials/delete/image/{social:id}', [SocialController::class, 'deleteImage'])->where('social', '[0-9]+')->middleware('auth');
Route::get('/socials/image/{social:id}', [SocialController::class, 'imageForm'])->where('social', '[0-9]+')->middleware('auth');
Route::post('/socials/image/{social:id}', [SocialController::class, 'image'])->where('social', '[0-9]+')->middleware('auth');

Route::get('/tools/list', [ToolController::class, 'list'])->middleware('auth');
Route::get('/tools/add', [ToolController::class, 'addForm'])->middleware('auth');
Route::post('/tools/add', [ToolController::class, 'add'])->middleware('auth');
Route::get('/tools/edit/{tool:id}', [ToolController::class, 'editForm'])->where('tool', '[0-9]+')->middleware('auth');
Route::post('/tools/edit/{tool:id}', [ToolController::class, 'edit'])->where('tool', '[0-9]+')->middleware('auth');
Route::get('/tools/delete/{tool:id}', [ToolController::class, 'delete'])->where('tool', '[0-9]+')->middleware('auth');
Route::get('/tools/delete/image/{tool:id}', [ToolController::class, 'deleteImage'])->where('tool', '[0-9]+')->middleware('auth');
Route::get('/tools/image/{tool:id}', [ToolController::class, 'imageForm'])->where('tool', '[0-9]+')->middleware('auth');
Route::post('/tools/image/{tool:id}', [ToolController::class, 'image'])->where('tool', '[0-9]+')->middleware('auth');

Route::get('/tools/types/list', [ToolTypeController::class, 'list'])->middleware('auth');
Route::get('/tools/types/add', [ToolTypeController::class, 'addForm'])->middleware('auth');
Route::post('/tools/types/add', [ToolTypeController::class, 'add'])->middleware('auth');
Route::get('/tools/types/edit/{toolType:id}', [ToolTypeController::class, 'editForm'])->where('toolType', '[0-9]+')->middleware('auth');
Route::post('/tools/types/edit/{toolType:id}', [ToolTypeController::class, 'edit'])->where('toolType', '[0-9]+')->middleware('auth');
Route::get('/tools/types/delete/{toolType:id}', [ToolTypeController::class, 'delete'])->where('toolType', '[0-9]+')->middleware('auth');

Route::get('/articles/list', [ArticleController::class, 'list'])->middleware('auth');
Route::get('/articles/add', [ArticleController::class, 'addForm'])->middleware('auth');
Route::post('/articles/add', [ArticleController::class, 'add'])->middleware('auth');
Route::get('/articles/edit/{article:id}', [ArticleController::class, 'editForm'])->where('article', '[0-9]+')->middleware('auth');
Route::post('/articles/edit/{article:id}', [ArticleController::class, 'edit'])->where('article', '[0-9]+')->middleware('auth');
Route::get('/articles/delete/{article:id}', [ArticleController::class, 'delete'])->where('article', '[0-9]+')->middleware('auth');
Route::get('/articles/delete/image/{article:id}', [ArticleController::class, 'deleteImage'])->where('article', '[0-9]+')->middleware('auth');
Route::get('/articles/image/{article:id}', [ArticleController::class, 'imageForm'])->where('article', '[0-9]+')->middleware('auth');
Route::post('/articles/image/{article:id}', [ArticleController::class, 'image'])->where('article', '[0-9]+')->middleware('auth');

Route::get('/articles/types/list', [ArticleTypeController::class, 'list'])->middleware('auth');
Route::get('/articles/types/add', [ArticleTypeController::class, 'addForm'])->middleware('auth');
Route::post('/articles/types/add', [ArticleTypeController::class, 'add'])->middleware('auth');
Route::get('/articles/types/edit/{articleType:id}', [ArticleTypeController::class, 'editForm'])->where('articleType', '[0-9]+')->middleware('auth');
Route::post('/articles/types/edit/{articleType:id}', [ArticleTypeController::class, 'edit'])->where('articleType', '[0-9]+')->middleware('auth');
Route::get('/articles/types/delete/{articleType:id}', [ArticleTypeController::class, 'delete'])->where('articleType', '[0-9]+')->middleware('auth');

Route::get('/pages/list', [PageController::class, 'list'])->middleware('auth');
Route::get('/pages/add', [PageController::class, 'addForm'])->middleware('auth');
Route::post('/pages/add', [PageController::class, 'add'])->middleware('auth');
Route::get('/pages/edit/{page:id}', [PageController::class, 'editForm'])->where('page', '[0-9]+')->middleware('auth');
Route::post('/pages/edit/{page:id}', [PageController::class, 'edit'])->where('page', '[0-9]+')->middleware('auth');
Route::get('/pages/delete/{page:id}', [PageController::class, 'delete'])->where('page', '[0-9]+')->middleware('auth');
Route::get('/pages/delete/image/{page:id}', [PageController::class, 'deleteImage'])->where('page', '[0-9]+')->middleware('auth');
Route::get('/pages/image/{page:id}', [PageController::class, 'imageForm'])->where('page', '[0-9]+')->middleware('auth');
Route::post('/pages/image/{page:id}', [PageController::class, 'image'])->where('page', '[0-9]+')->middleware('auth');

Route::get('/assignments/list', [AssignmentController::class, 'list'])->middleware('auth');
Route::get('/assignments/add', [AssignmentController::class, 'addForm'])->middleware('auth');
Route::post('/assignments/add', [AssignmentController::class, 'add'])->middleware('auth');
Route::get('/assignments/edit/{assignment:id}', [AssignmentController::class, 'editForm'])->where('assignment', '[0-9]+')->middleware('auth');
Route::post('/assignments/edit/{assignment:id}', [AssignmentController::class, 'edit'])->where('assignment', '[0-9]+')->middleware('auth');
Route::get('/assignments/delete/{assignment:id}', [AssignmentController::class, 'delete'])->where('assignment', '[0-9]+')->middleware('auth');
Route::get('/assignments/delete/image/{assignment:id}', [AssignmentController::class, 'deleteImage'])->where('assignment', '[0-9]+')->middleware('auth');
Route::get('/assignments/image/{assignment:id}', [AssignmentController::class, 'imageForm'])->where('assignment', '[0-9]+')->middleware('auth');
Route::post('/assignments/image/{assignment:id}', [AssignmentController::class, 'image'])->where('assignment', '[0-9]+')->middleware('auth');

Route::get('/courses/list', [CourseController::class, 'list'])->middleware('auth');
Route::get('/courses/add', [CourseController::class, 'addForm'])->middleware('auth');
Route::post('/courses/add', [CourseController::class, 'add'])->middleware('auth');
Route::get('/courses/edit/{course:id}', [CourseController::class, 'editForm'])->where('course', '[0-9]+')->middleware('auth');
Route::post('/courses/edit/{course:id}', [CourseController::class, 'edit'])->where('course', '[0-9]+')->middleware('auth');
Route::get('/courses/delete/{course:id}', [CourseController::class, 'delete'])->where('course', '[0-9]+')->middleware('auth');
