<div class="flex flex-wrap gap-4 justify-between lg:mt-auto mt-7">
    <ul class="list-none flex gap-4">
        @foreach ($categories as $category)
        <li>
            <a href="{{route('blog', ['category' => $category->id])}}" class="text-2xl font-bold text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-100">
                {{ $category->name }}
            </a>
        </li>
        @endforeach
    </ul>
    <flux:button href="{{ route('blog.post', ['post' => $post]) }}" class="px-15 text-3xl font-bold tracking-widest uppercase">
        {{ __('blog.more') }}
        <x-icon name="book-open" class="md:block hidden ml-2" />
    </flux:button>
</div>