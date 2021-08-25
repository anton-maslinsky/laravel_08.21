<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IndexController;
//Controllers
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;

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

Route::get('/', [NewsController::class, 'index'])
    ->name('news');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', IndexController::class)->name('index');
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
});


Route::group(['prefix' => 'news'], function () {
    Route::get('/', [NewsController::class, 'index'])
        ->name('news');
    Route::get('/show/{news}', [NewsController::class, 'show'])
        ->where('news', '\d+')
        ->name('news.show');
});

Route::get('collection', function () {
    $collection = collect([
        ['name' => 'Alex', 'age' => 35, 'work' => 'Doctor'],
        ['name' => 'John', 'age' => 28, 'work' => 'IT'],
        ['name' => 'Mike', 'age' => 43, 'work' => 'Builder'],
        ['name' => 'Alex', 'age' => 35, 'work' => 'Engineer']
    ]);

    dd(
        $collection->map(fn($people) => $people['name'])
    );
});


