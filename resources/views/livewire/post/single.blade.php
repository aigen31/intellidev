<?php

use App\Models\Post;
use Livewire\Volt\Component;

new class extends Component {
    public function mount(Post $post)
    {
        $this->post = $post;
    }
}; ?>

<div class="2xl:container max-w-7xl mx-auto flex gap-4 flex-col">
    <p class="text-sm text-gray-500">Published on {{ $this->post->created_at->format('F j, Y') }}</p>
    <h1 class="text-6xl uppercase font-bold mb-5">{{ $this->post->title }}</h1>
    <div class="text-xl">{{ $this->post->content }}</div>
</div>