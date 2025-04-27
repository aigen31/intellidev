<?php

use App\Models\Category;
use App\Models\Post;
use Livewire\Volt\Component;

new class extends Component {
    public function mount(Category $category)
    {
        $this->category = $category;
        $this->posts = $category->exists ? $this->category->posts()->paginate(10) : Post::paginate(10);
        $this->title = $category->exists ? $category->name : __('blog.all_posts');
    }
}; ?>

<div class="2xl:container max-w-7xl mx-auto flex gap-4 flex-col">
    <x-post.loop :title='$this->title' :posts='$this->posts' />
</div>