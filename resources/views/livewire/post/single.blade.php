<?php

use App\Models\Post;
use Carbon\CarbonInterval;
use Livewire\Volt\Component;

new class extends Component {
    public function mount(Post $post)
    {
        $this->post = $post;
        $this->categories = $post->categories;
        $this->readTime = CarbonInterval::minutes($post->translation()->read_time)->cascade()->forHumans();
    }
}; ?>

<div class="2xl:container max-w-7xl mx-auto flex flex-col">
    <div class="md:text-base text-sm text-gray-400 flex items-center justify-between gap-4 lg:mb-7 mb-2">
        <div class="flex flex-row items-center gap-1.5 text-blue-700">
            <x-icon name="user" />
            {{ $this->post->user->name }}
        </div>
        <div class="flex flex-row items-center gap-1.5">
            {{ $this->post->translation()->created_at->translatedFormat('j F, Y') }}
            <x-icon name="calendar" class="w-6" />
        </div>
    </div>
    <div class="flex justify-between gap-4 mb-7">
        <div class="flex flex-row items-center gap-2">
            @foreach ($this->categories as $category)
            <a href="{{ route('blog', $category) }}" class="text-sm text-gray-400 hover:text-gray-600">
                {{ $category->translation()->name }}
            </a>
            @endforeach
        </div>
        <div class="text-sm text-gray-400 flex items-center gap-1.5">
            {{ $this->readTime }}
            <x-icon name="clock" class="w-6" />
        </div>
    </div>

    <h1 class="2xl:text-6xl md:text-5xl text-4xl uppercase font-bold mb-7 max-w-7xl bg-gradient-to-r from-blue-700 via-purple-700 to-cyan-400 bg-clip-text text-transparent">
        {{ $this->post->translation()->title }}
    </h1>
    <div class="text-xl">{!! $this->post->translation()->content !!}</div>
</div>