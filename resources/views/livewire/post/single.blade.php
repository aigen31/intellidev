<?php

use App\Http\Controllers\CommentController;
use App\Models\Post;
use App\Services\CommentService;
use App\Services\ReadTimeService;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use Livewire\Volt\Component;

new class extends Component {
    public $durationStatus;
    public $post;
    public $categories;
    public $durationCssClass;
    public $readTime;
    public $message;
    public $parentCommentId;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->categories = $post->categories;
        $this->readTime = CarbonInterval::minutes($post->translation()->read_time)->cascade()->forHumans();
        $this->durationCssClass = ReadTimeService::getCssClass($post->translation()->read_time);
    }

    public function reply()
    {
        CommentService::create([
            'post_id' => $this->post->id,
            'content' => $this->message,
            'parent_comment_id' => $this->parentCommentId,
        ]);

        $this->dispatch('comment-added');
    }
}; ?>

<div class="2xl:container max-w-7xl mx-auto flex flex-col">
    @if ($this->post->user->name || $this->post->translation()->created_at)
    <div class="md:text-base text-sm text-gray-400 flex items-center justify-between gap-4 lg:mb-7 mb-2">
        @if ($this->post->user->name)
        <div class="flex flex-row items-center gap-1.5">
            <x-icon name="user" class="w-5 h-5 text-blue-300" />
            <span class="text-gray-900">{{ $this->post->user->name }}</span>
        </div>
        @endif
        @if ($this->post->translation()->created_at)
        <div class="flex flex-row items-center gap-1.5">
            <span class="text-gray-400">{{ $this->post->translation()->created_at->translatedFormat('j F, Y') }}</span>
            <x-icon name="calendar" class="w-5 h-5 text-blue-300" />
        </div>
        @endif
    </div>
    @endif
    @if ($this->categories)
    <div class="flex justify-between gap-4 mb-7">
        <div class="flex flex-row items-center gap-2">
            @foreach ($this->categories as $category)
            <a href="{{ route('blog', $category) }}" class="text-sm text-white bg-blue-200 px-3 py-2 rounded-lg hover:bg-blue-300">
                {{ $category->translation()->name }}
            </a>
            @endforeach
        </div>
        <div class="text-sm flex items-center gap-1.5 bg-{{ $this->durationCssClass }} px-3 py-2 rounded-lg">
            <span class="font-medium text-white">{{ $this->readTime }}</span>
            <x-icon name="clock" class="w-5 h-5 text-white" />
        </div>
    </div>
    @endif

    @if($this->post->translation()->title)
    <h1 class="2xl:text-6xl md:text-5xl text-4xl uppercase font-bold mb-7 max-w-7xl">
        {{ $this->post->translation()->title }}
    </h1>
    @endif

    @if($this->post->translation()->content)
    <div class="text-xl text-gray-900">{!! $this->post->translation()->content !!}</div>
    @endif

    <div class="max-w-4xl mx-auto mt-10">
        <h2 class="text-2xl font-semibold mb-4">{{ __('blog.comments') }}</h2>
        @if($this->post->comments->count())
        <ul class="space-y-6">
            @foreach($this->post->comments->where('parent_comment_id', null) as $comment)
            <x-post.comment :comment="$comment" :level="0" :component="$this" />
            @endforeach
        </ul>
        @else
        <div class="text-gray-500 italic bg-gray-50 border border-gray-200 rounded-xl p-5 text-center">{{ __('blog.without_comment') }}</div>
        @endif
    </div>
</div>