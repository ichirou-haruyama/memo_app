<?php

use function Livewire\Volt\{state};
use App\Models\Memo;

// ルートモデルバインディング
state(['memo' =>  fn(Memo $memo) => $memo]);

?>

<div>
    <h1>{{ $memo->title }}</h1>
    <p>{!! nl2br(($memo->body)) !!}</p>
</div>
