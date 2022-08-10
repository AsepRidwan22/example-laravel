<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardMahasiswaController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardDosenController;
use App\Http\Controllers\DashboardLogbookController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home', [
        "title" => "home",
        'active' => "home",
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "about",
        'active' => "about",
        "name" => "Asep Ridwan"
    ]);
});


Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}',  [PostController::class, 'show']);

Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        'active' => "categories",
        'categories' => Category::all()
    ]);
});


// Route::get('/categories/{category:slug}', function (Category $category) {
//     return view('posts', [
//         'title' => "Post by Category : $category->name",
//         'active' => "categories",
//         'posts' => $category->posts->load('category', 'author'),
//     ]);
// });

// Route::get('/authors/{author:username}', function (User $author) {
//     return view('posts', [
//         'title' => "Post by Author : $author->name",
//         'active' => 'posts',
//         'posts' => $author->posts->load('category', 'author'), //lazy eager loading
//     ]);
// });


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/dashboard/register', [RegisterController::class, 'index']);
Route::get('/dashboard/register/mhs', [RegisterController::class, 'indexMhs']);
Route::post('/dashboard/register', [RegisterController::class, 'store']);


Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');


// Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/mahasiswas', DashboardMahasiswaController::class)->middleware(['is_koordinator']);

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('is_koordinator');

Route::resource('/dashboard/dosens', DashboardDosenController::class)->except('show')->middleware('auth');

Route::resource('/dashboard/logbooks', DashboardLogbookController::class)->middleware('auth');
Route::get('/dashboard/logbooks/{logbooks:id}/create', [DashboardLogbookController::class, 'bodyUpdate'])->middleware('auth');
Route::put('/dashboard/logbook/create/{logbooks:id}', [DashboardLogbookController::class, 'createUpdate'])->middleware('auth');
Route::get('/dashboard/logbooks/mhs/{mahasiswa:npm}', [DashboardLogbookController::class, 'showLogbookMhs']);

// Route::get('/dashboard/logbooks/{logbooks:user_id}', DashboardLogbookController::class, 'show2')->middleware('auth');
