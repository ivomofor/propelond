<?

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\API\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
// */

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Authentication

// Route::get('register',[UserController::class, 'register']);

// Route::get('/', [UserController::class, 'index']);
// Route::get('/', [App\Http\Controllers\UserController::class, 'index']);

// Route::prefix('auth')->group(function () {
//     Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);

// });


    Route::post('register', [App\Http\Controllers\AuthController::class, 'register']);
    Route::post('login', [App\Http\Controllers\AuthController::class, 'login']);
    Route::post('logout', [App\Http\Controllers\AuthController::class, 'logout']);







Route::prefix('users')->group(function () {
    Route::get('/', [App\Http\Controllers\UserController::class, 'index']);
    Route::post('update/{id}', [App\Http\Controllers\UserController::class, 'update']);

});

Route::post('post', [PostController::class, 'post']);

