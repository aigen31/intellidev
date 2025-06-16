<li class="bg-gray-50 border border-gray-200 rounded-xl p-5 shadow-sm ml-{{ $level * 8 }}"
    x-data="{
        showForm: false,
        init() {
            $wire.on('comment-added', () => { this.showForm = false });
        }
    }"
>
    <div class="flex items-center gap-2 mb-2">
        <span class="font-bold text-blue-700">{{ $comment->user->name }}</span>
        <span class="text-xs text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
    </div>
    <div class="text-gray-800 leading-relaxed">
        {{ $comment->content }}
    </div>
    <flux:button class="mt-5" size="sm" x-on:click="showForm = !showForm; $wire.parentCommentId = {{ $comment->id }}">{{ __('comment.reply') }}</flux:button>
    <form class="rounded-lg" x-show="showForm" wire:submit="reply">
        <textarea class="w-full p-2 border border-gray-300 rounded-lg mt-2" rows="3" wire:model="message" placeholder="{{ __('comment.write_your_reply') }}"></textarea>
        <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">{{ __('comment.submit') }}</button>
    </form>
    @if($comment->children()->count())
    <ul class="space-y-6 mt-4">
        @foreach($comment->children()->get() as $child)
        <x-post.comment :comment="$child" :level="$level + 1" :component="$component" />
        @endforeach
    </ul>
    @endif
</li>