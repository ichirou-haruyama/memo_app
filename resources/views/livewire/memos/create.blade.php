<?php

use function Livewire\Volt\{state, rules};
use App\Models\Memo;

state(['title', 'body', 'priority']);

//バリテーションルールを定義
    rules([
        'title' => 'required|string|max:50',
        'body' => 'required|string|max:2000',
    ]);
//メモを保存する関数
$store = function() {
    $this->validate(); //バリテーションチェック
    Memo::create([
        'title' => $this->title,
        'body' => $this->body,
        'priority' => $this->priority
    ]);
    //一覧ページにリダイレクト
    return redirect()->route('memos.index');
};
?>

<div>
    <a href="{{ route('memos.index') }}">見る</a>
    <h1>新規登録</h1>
    <form wire:submit="store">
        <p>
            <lavel for="title">タイトル</lavel>
            @error('title')
                <span class="error">({{ $message }})</span>
            @enderror<br>
            <input type="text" wire:model="title" id="title">
        </p>
        <p>
            <label for="body">本文</label>
            @error('body')
                <span class="error">({{ $message }})</span>
            @enderror<br>
            <!-- wire:model="body"で入力値とコンポーネントの状態($this->body)を自動的に同期 -->
            <textarea wire:model="body" id="body"></textarea>
            <select name="priority">
                <option value="1">低</option>
                <option value="2">中</option>
                <option value="3">高</option>
            </select>

        </p>

        <button type="submit">登録</button>
    </form>
</div>
