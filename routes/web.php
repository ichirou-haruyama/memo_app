<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
});

//詳細ページ
Volt::route('/memos/{memo}', 'memos.show')->name('memos.show');
