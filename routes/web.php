<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');
Route::view('/darurat', 'pages.emergency')->name('emergency');
Route::view('/tanya-ai', 'pages.ai-chat')->name('ai-chat');
Route::view('/panduan-langkah', 'pages.action-guide')->name('action-guide');
Route::view('/scan-dokumen', 'pages.document-scan')->name('document-scan');
Route::view('/hubungi', 'pages.contact')->name('contact');
Route::view('/halokum', 'pages.halokum')->name('halokum');
Route::view('/justice-viral', 'pages.justice-viral')->name('justice-viral');
Route::view('/safe-exit', 'pages.safe-exit')->name('safe-exit');
Route::view('/akun', 'pages.auth.landing')->name('auth.landing');
Route::view('/masuk', 'pages.auth.login')->name('login');
Route::view('/daftar', 'pages.auth.register')->name('register');
Route::view('/lupa-password', 'pages.auth.forgot-password')->name('password.request');
Route::view('/reset-password', 'pages.auth.reset-password')->name('password.reset');

Route::redirect('/about', '/');
Route::redirect('/konten', '/panduan-langkah');
Route::redirect('/contact', '/hubungi');
