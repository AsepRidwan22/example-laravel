<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardDosenController;
use App\Http\Controllers\DashboardLogbookController;
use App\Http\Controllers\DashboardProfileController;
use App\Http\Controllers\DashboardProgresController;
use App\Http\Controllers\DashboardSeminarController;
use App\Http\Controllers\DashboardProposalController;
use App\Http\Controllers\DashboardMahasiswaController;
use App\Http\Controllers\DashboardPenilaianController;

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

// Route::get('/', function () {
//     return view('login.index', [
//         "title" => "home",
//         'active' => "home",
//     ]);
// });

Route::get('/welcome', function () {
    return view('dashboard.welcome', [
        "title" => "home",
        'active' => "home",
    ]);
});

// Route::get('/posts', [PostController::class, 'index']);
// Route::get('/posts/{post:slug}',  [PostController::class, 'show']);

// Route::get('/categories', function () {
//     return view('categories', [
//         'title' => 'Post Categories',
//         'active' => "categories",
//         'categories' => Category::all()
//     ]);
// });


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


Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
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
Route::get('dashboard/bimbingans', [DashboardMahasiswaController::class, 'bimbingan'])->middleware(['is_koordinator']);
Route::get('dashboard', [DashboardMahasiswaController::class, 'dashboard'])->middleware(['auth']);

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('is_koordinator');

Route::resource('/dashboard/dosens', DashboardDosenController::class)->except('show')->middleware('auth');

Route::resource('/dashboard/logbooks', DashboardLogbookController::class)->middleware('auth');
Route::get('/dashboard/logbooks/{logbooks:id}/create', [DashboardLogbookController::class, 'bodyUpdate'])->middleware('auth');
Route::put('/dashboard/logbook/create/{logbooks:id}', [DashboardLogbookController::class, 'createUpdate'])->middleware('auth');
Route::get('/dashboard/logbooks/mhs/{mahasiswa:npm}', [DashboardLogbookController::class, 'showLogbookMhs']);


Route::resource('/dashboard/progres', DashboardProgresController::class)->middleware('auth');
Route::get('/dashboard/mahasiswas/progres/{user:user_id}', [DashboardProgresController::class, 'showProgresMhs']);
Route::resource('/dashboard/profile', DashboardProfileController::class);
Route::post('/dashboard/mahasiswa/import', [DashboardMahasiswaController::class, 'import'])->middleware('auth');
Route::post('/dashboard/dosen/import', [DashboardDosenController::class, 'import'])->middleware('auth');


Route::resource('/dashboard/proposals', DashboardProposalController::class)->middleware('auth');
Route::get('/dashboard/instansis', [DashboardProposalController::class, 'indexInstansi'])->middleware('auth');
Route::put('/dashboard/proposals/accept/{proposal:mahasiswa_id}', [DashboardProposalController::class, 'accept'])->middleware('auth');
Route::put('/dashboard/proposals/edit-proposal/{id}', [DashboardProposalController::class, 'revisi'])->middleware('auth');

Route::resource('/dashboard/seminars', DashboardSeminarController::class)->middleware('auth');
// Route::get('/dashboard/seminars/{seminar:id}/accseminar', [DashboardSeminarController::class, 'accseminar'])->middleware('auth');
Route::put('/dashboard/seminars/accseminar/{seminar:id}', [DashboardSeminarController::class, 'prosesAcc'])->middleware('auth');
Route::get('/dashboard/seminars/{seminar:id}/addjadwal', [DashboardSeminarController::class, 'addJadwal'])->middleware('auth');
Route::get('/dashboard/seminars/jadwal/show', [DashboardSeminarController::class, 'showJadwal'])->middleware('auth');
Route::put('/dashboard/seminars/addjadwal/{seminar:id}', [DashboardSeminarController::class, 'prosesJadwal'])->middleware('auth');
Route::get('/dashboard/rekapitulasi', [DashboardSeminarController::class, 'rekapitulasi'])->middleware('auth');

Route::resource('/dashboard/penilaians/bimbingan', DashboardPenilaianController::class)->middleware('auth');
Route::get('/dashboard/penilaians/bimbingan/{mahasiswa:id}/create', [DashboardPenilaianController::class, 'viewPembimbing'])->middleware('auth');
Route::put('/dashboard/penilaians/bimbingan/create/{mahasiswa:id}', [DashboardPenilaianController::class, 'nilaiPembimbing'])->middleware('auth');

Route::get('/dashboard/penilaians/penguji', [DashboardPenilaianController::class, 'penguji'])->middleware('auth');
Route::get('/dashboard/penilaians/penguji/{mahasiswa:id}/create', [DashboardPenilaianController::class, 'viewPenguji'])->middleware('auth');
Route::put('/dashboard/penilaians/penguji/create/{mahasiswa:id}', [DashboardPenilaianController::class, 'nilaiPenguji'])->middleware('auth');

// Route::get('/dashboard/logbooks/{logbooks:user_id}', DashboardLogbookController::class, 'show2')->middleware('auth');
