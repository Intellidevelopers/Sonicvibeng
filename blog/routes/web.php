<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdvertController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\QuoteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Blog\CommentController;
use App\Http\Controllers\Blog\HomeController;
use App\Http\Controllers\User\DepositController;
use App\Http\Controllers\User\UserController;
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
Route::get('/signin', [AuthController::class, 'signin'])->name('signin');
Route::get('/adminlogin', [AuthController::class, 'adminlogin'])->name('adminlogin');
Route::post('/signin-action', [AuthController::class, 'signinAction'])->name('signin.action');
Route::post('/signup-action', [AuthController::class, 'signupAction'])->name('signup.action');
Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
Route::get('/password_recover', [AuthController::class, 'passwordRecover'])->name('password.recover');
Route::post('/passwordrecover-action', [AuthController::class, 'passwordrecoverAction'])->name('passwordrecover.action');
Route::get('/new-password/{token}', [AuthController::class, 'newPassword'])->name('new_password');
Route::post('/updatepassword-action', [AuthController::class, 'updatepasswordAction'])->name('updatepassword.action');

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('about',[HomeController::class,'about'])->name('about');
Route::get('recent-post', [HomeController::class, 'recentPost'])->name('recent.post');
Route::get('author', [HomeController::class, 'authors'])->name('author');
Route::get('author/{id}', [HomeController::class, 'author'])->name('author');
Route::get('contact', [HomeController::class, 'contact'])->name('contact');
Route::post('contact-action', [HomeController::class, 'contactAction'])->name('contact.action');
Route::get('home/{id}', [HomeController::class, 'category'])->name('category');
Route::get('blog/{id}', [HomeController::class, 'blog'])->name('blog');
Route::get('blog-two/{id}', [HomeController::class, 'blogTwo'])->name('blog.two');
Route::get('post/{id}', [HomeController::class, 'post'])->name('post');
Route::post('add-comment', [CommentController::class, 'addComment'])->name('add.comment');
Route::post('add-replycomment', [CommentController::class, 'addreplyComment'])->name('add.replycomment');

Route::get('search', [HomeController::class, 'searchPost'])->name('search.post');
Route::post('home', [HomeController::class, 'searchAction'])->name('search.action');

Route::group(['middleware' => 'auth:user', 'prefix' => 'user'], function () {
    Route::get('dashboard',[UserController::class,'dashboard'])->name('dashboard');
    
    //Deposit route
    Route::get('deposit',[DepositController::class,'deposit'])->name('deposit');
    Route::post('deposit-action', [DepositController::class, 'depositAction'])->name('deposit.action');
    Route::get('payment', [DepositController::class, 'payment'])->name('payment');
    Route::get('payment-confirmation', [DepositController::class, 'paymentConfirmation'])->name('payment.confirmation');
}); 

Route::group(['middleware' => 'auth:admin', 'prefix' => 'admin'], function () {
    Route::get('admin-dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('manage-contact-request', [AdminController::class, 'manageContactRequest'])->name('manage.contact.request');
    Route::get('view-request-form/{id}', [AdminController::class, 'viewRequestForm'])->name('view.request.form');
    Route::get('delete-request-form/{id}', [AdminController::class, 'deleteRequestForm'])->name('delete.request.form');
    Route::get('delete-comment/{id}', [AdminController::class, 'deletecomment'])->name('delete.comment');
    Route::post('logout', [AdminController::class, 'logout'])->name('logout');
    
    Route::get('category', [CategoryController::class, 'category'])->name('category');
    Route::post('submit-category',[CategoryController::class,'submitCategory'])->name('submit.category');
    Route::get('get-category/{id}', [CategoryController::class, 'getCategory'])->name('get.category');
    Route::get('edit-category/{id}', [CategoryController::class, 'editCategory'])->name('edit.category');
    Route::post('update-category', [CategoryController::class, 'updateCategory'])->name('update.category');
    Route::get('delete-category/{id}', [CategoryController::class, 'deleteCategory'])->name('delete.category');

    Route::get('quote', [QuoteController::class, 'quote'])->name('quote');
    Route::post('submit-quote', [QuoteController::class, 'submitQuote'])->name('submit.quote');
    Route::get('get-quote/{id}', [QuoteController::class, 'getQuote'])->name('get.quote');
    Route::get('edit-quote/{id}', [QuoteController::class, 'editQuote'])->name('edit.quote');
    Route::post('update-quote', [QuoteController::class, 'updateQuote'])->name('update.quote');
    Route::get('delete-quote/{id}', [QuoteController::class, 'deleteQuote'])->name('delete.quote');

    Route::get('add-contact',[ContactController::class,'addContact'])->name('add.contact');
    Route::get('manage-contact', [ContactController::class, 'manageContact'])->name('manage.contact');
    Route::post('submit-contact', [ContactController::class, 'submitContact'])->name('submit.contact');
    Route::get('edit-contact/{id}', [ContactController::class, 'editContact'])->name('edit.contact');
    Route::post('update-contact', [ContactController::class, 'updateContact'])->name('update.contact');
    Route::get('delete-contact/{id}', [ContactController::class, 'deleteContact'])->name('delete.contact');

    Route::get('add-post', [PostController::class, 'addPost'])->name('add.post');
    Route::get('manage-post', [PostController::class, 'managePost'])->name('manage.post');
    Route::get('pending-post', [PostController::class, 'pendingPost'])->name('pending.post');
    Route::post('submit-post', [PostController::class, 'submitPost'])->name('submit.post');
    Route::get('edit-post/{id}', [PostController::class, 'editPost'])->name('edit.post');
    Route::post('update-post', [PostController::class, 'updatePost'])->name('update.post');
    Route::get('delete-post/{id}', [PostController::class, 'deletePost'])->name('delete.post');

    Route::get('add-advert', [AdvertController::class, 'addadvert'])->name('add.advert');
    Route::get('manage-advert', [AdvertController::class, 'manageAdvert'])->name('manage.advert');
    Route::get('pending-advert', [AdvertController::class, 'pendingadvert'])->name('pending.advert');
    Route::post('submit-advert', [AdvertController::class, 'submitadvert'])->name('submit.advert');
    Route::get('edit-advert/{id}', [AdvertController::class, 'editAdvert'])->name('edit.advert');
    Route::post('update-advert', [AdvertController::class, 'updateAdvert'])->name('update.advert');
    Route::get('delete-advert/{id}', [AdvertController::class, 'deleteAdvert'])->name('delete.advert');

    
    Route::get('settings',[GeneralSettingController::class,'index'])->name('settings');
    Route::get('changepassword', [GeneralSettingController::class, 'changepassword'])->name('changepassword');
    Route::post('update-changepassword', [GeneralSettingController::class, 'updateChangePassword'])->name('update.change.password');
    Route::post('add-settings', [GeneralSettingController::class, 'addSettings'])->name('add.settings');

   
});