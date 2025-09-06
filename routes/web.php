<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

//Route::get('/', function () {
    //return view('welcome');
//});

//一覧ページ
//Volt::route('/memos', 'memos.index')->name('memos.index');
Volt::route('/', 'memos.index')->name('memos.index');
//新規登録ページ
Volt::route('/memos/create', 'memos.create')->name('memos.create');
//詳細ページ
Volt::route('/memos/{memo}', 'memos.show')->name('memos.show');
//編集ページ
Volt::route('/memos/{memo}/edit', 'memos.edit')->name('memos.edit');

