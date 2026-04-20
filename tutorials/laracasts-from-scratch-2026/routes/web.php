<?php

use App\Http\Controllers\IdeaController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home', ['title' => 'Home'])->name('home');

Route::view('/about', 'about', ['title' => 'About'])->name('about');

Route::view('/contact', 'contact', ['title' => 'Contact'])->name('contact');

Route::resource('ideas', IdeaController::class);
