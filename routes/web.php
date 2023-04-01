<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\API\SocialAuthController;
use App\Http\Controllers\ProfileMainController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CommentsController;

use App\Http\Controllers\FollowsController;
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

Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/privacy-policy', function () {
    return view('privacy');
})->name('privacy');
// welcome page
Route::get('/', [WelcomeController::class, 'index'])->name('/');
// To contact page
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

// To Send data to email.
Route::post('/contact/sending', [ContactController::class, 'send'])->name('contact.store');
// To show or create blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
// get single blogpost

Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create')->middleware('auth');
// store the blog post
Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store');

// filepond upload
Route::post('/tmp-upload', [BlogController::class, 'tmpUpload']);
Route::delete('/tmp-delete', [BlogController::class, 'tmpDelete']);
Route::post('/tmp-upload-update', [BlogController::class, 'tmpUploadUp']);
Route::delete('/tmp-delete-update', [BlogController::class, 'tmpDeleteDl']);
// view all ipost
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');
// to edit one blog post
Route::get('/blog/{post}/edit', [BlogController::class, 'edit'])->name('blog.edit');
Route::put('/blog/{post}', [BlogController::class, 'update'])->name('blog.update');
Route::delete('/blog/{post}', [BlogController::class, 'destroy'])->name('blog.destroy');
// post comment store
Route::post('/posts/{post}/comments', [CommentsController::class, 'store'])->name('comments.store');

// post like or dislike

Route::post('/posts/{post}/like', [LikeController::class, 'like'])->name('posts.like');
Route::post('/posts/{post}/dislike', [LikeController::class, 'dislike'])->name('posts.dislike');


// category resource controller

Route::resource('/categories', CategoryController::class);
// profile main resource controller route for user details
Route::resource('/user', ProfileMainController::class);
Route::get('/user/{profile_mains:uname}', [ProfileMainController::class, 'shareProfile'])->name('profilemain.shareProfile');
// dashboared route controller and function
Route::get('/dashboard',[BlogController::class, 'dashindex'])->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

Route::get('/logout', [WelcomeController::class, 'logout'])->name('logout.perform');

Route::get('/profile/edit', [ProfileController::class, 'profileEdit'])->name('profileMain.edit');

// google login and signup
Route::get('/login-google', [SocialAuthController::class, 'redirectToProvider'])->name('google.login');
Route::get('/api/auth/google/callback', [SocialAuthController::class, 'handleCallback'])->name('google.login.callback');
// github login and signup
Route::get('/login-github', [SocialAuthController::class, 'redirectToProviderGithub'])->name('github.login');
Route::get('api/auth/callback', [SocialAuthController::class, 'handleCallbackGithub'])->name('github.login.callback');


// user follows routes
Route::post('/users/{user}/follow', [FollowsController::class, 'follow'])->name('follow');
Route::post('/users/{user}/unfollow', [FollowsController::class, 'unfollow'])->name('unfollow');
Route::get('/users', [FollowsController::class, 'show'])->name('show');
