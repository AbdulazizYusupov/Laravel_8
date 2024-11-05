<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\JavobController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\VariantController;

Route::get('/', [IndexController::class, 'index']);
Route::get('/posts{post}',[IndexController::class,'post'])->name('posts');
Route::post('/create-comment',[IndexController::class,'comment']);
Route::post('/likes',[IndexController::class,'like'])->name('likes');
Route::post('/dislikes',[IndexController::class,'dislike'])->name('dislikes');

Route::get('/category', [CategoryController::class, 'index']);
Route::get('/create-category', [CategoryController::class, 'create']);
Route::post('/category', [CategoryController::class, 'store']);
Route::post('/delete-category', [CategoryController::class, 'destroy']);
Route::put('/update-category/{category}', [CategoryController::class, 'update'])->name('category.update');
Route::get('/category-search', [CategoryController::class, 'search'])->name('category.search');
Route::post('/category-active',[CategoryController::class,'active'])->name('category.active');

Route::get('/post', [PostController::class, 'index']);
Route::get('/create-post', [PostController::class, 'create']);
Route::post('/post', [PostController::class, 'store']);
Route::post('/delete-post', [PostController::class, 'destroy']);
Route::put('/update-post/{post}', [PostController::class, 'update'])->name('post.update');
Route::get('/post-search', [PostController::class, 'search'])->name('post.search');

Route::get('/question', [QuestionController::class, 'index']);
Route::get('/create-question', [QuestionController::class, 'create']);
Route::post('/question', [QuestionController::class, 'store']);
Route::post('/delete-question', [QuestionController::class, 'destroy']);
Route::put('/update-question/{question}', [QuestionController::class, 'update'])->name('question.update');
Route::get('/question-search', [QuestionController::class, 'search'])->name('question.search');

Route::get('/variant', [VariantController::class, 'index']);
Route::post('/variant', [VariantController::class, 'store']);
Route::post('/delete-variant', [VariantController::class, 'destroy']);
Route::put('/update-variant/{variant}', [VariantController::class, 'update'])->name('variant.update');
Route::get('/variant-search', [VariantController::class, 'search'])->name('variant.search');

Route::get('/javob', [JavobController::class, 'index']);
Route::post('/javob', [JavobController::class, 'store'])->name('javob-store');
Route::post('/delete-javob', [JavobController::class, 'destroy']);
Route::post('/count',[JavobController::class,'count']);

Route::get('/login', [AuthController::class, 'loginPage'])->name('loginPage');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', [AuthController::class, 'registerPage'])->name('registerPage');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');
