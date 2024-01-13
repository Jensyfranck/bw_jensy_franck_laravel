<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FAQCategoryController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\FAQItemController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/users/{user}', function (App\Models\User $user) {
    return view('profile', ['user' => $user]);
})->name('user.profile');

Route::get('/about', function () {
    return view('about');
})->name('about');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/user/edit-profile', [UserController::class, 'editProfile'])->name('user.edit-profile');
    Route::put('/user/update-profile', [UserController::class, 'updateProfile'])->name('user.update-profile');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/news/index', [NewsController::class, 'index'])->name('news.index');
    Route::get('/news/show', [NewsController::class, 'show'])->name('news.show');
    Route::get('/faqs', [FAQController::class, 'index'])->name('faqs.index');
    Route::get('/emails/contact', [ContactController::class, 'showForm'])->name('contact.form');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::post('/posts/{post}/likes', [LikeController::class, 'store'])->name('posts.likes.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
});


// Admin-only routes (Only admins can create, edit, and delete news items)
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');
    Route::get('/news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('/news/{news}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/promote/{userId}', [AdminController::class, 'promoteToAdmin'])->name('admin.promote');
    Route::resource('faqs-categories', FAQCategoryController::class)->middleware('is_admin');
    Route::resource('faqs-items', FAQItemController::class)->middleware('is_admin');
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::post('/admin/users/{user}/promote', [UserController::class, 'promote'])->name('admin.users.promote');
});


require __DIR__.'/auth.php';
