<?php

use function Livewire\Volt\{state, mount, rules};
use App\Models\Memo;

//フォームの状態を管理
state(['memo', 'title', 'body']);

rules([
    'title' => 'required|string|max:50',
    'body' => 'required|string|max2000',
]);

// ルートモデルバインディングはmountでまとめて行う
mount(function (Memo $memo) {
    $this->memo = $memo;
    $this->title = $memo->title;
    $this->body = $memo->body;
});

$update = function () {
    $this->validate();
    $this->memo->update($this->all());
    return redirect()->route('memos.show', $this->memo);
};

?>

<div>
    <a href="{{ route('memos.show', $memo) }}">戻る</a>
    <h1>更新</h1>

    <!-- wire:submit="update"でフォーム送信時にupdate関数を呼び出し -->
    <form wire:submit="update">
        <p>
            <label for="title">タイトル</label>
            @error('title')<span class="error">({{ $message }})</span>
            @enderror<br>
            <!-- wire:model="title"で入力値とコンポーネントの状態($this->title)を自動的に同期 -->
            <input type="text" wire:model="title" id="title">
        </p>
        <p>
            <label for="body">本文</label>
            @error('body')
                <span class="error">({{ $message }})</span>
            @enderror<br>
            <!-- wire:model="body"で入力値とコンポーネントの状態($this->body)を自動的に同期 -->
            <textarea wire:model="body" id="body"></textarea>
        </p>

        <button type="submit">更新</button>
    </form>
</div>
