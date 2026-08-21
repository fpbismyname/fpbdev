<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::home');
Route::livewire('/portfolio', 'pages::portfolio');
Route::livewire('/about', 'pages::about');
Route::livewire('/blog', 'pages::blog');
Route::livewire('/blog/{post:slug}', 'pages::post');
