<?php

use App\Models\Category;
use App\Models\Post;
use Livewire\Volt\Component;

new class extends Component {
    protected $listeners = ['loadMore'];

    public $perPage = 10;

    public $title;

    public $postsCount;

    public function loadMore()
    {
        if ($this->perPage >= $this->postsCount) {
            return;
        }

        $this->perPage += 10;
    }

    public function getPostsProperty(Category $category)
    {
        $this->category = $category;
        return $this->category->exists ? $this->category->posts()->take($this->perPage)->get() : Post::take($this->perPage)->get();
    }

    public function mount(Category $category)
    {
        $this->postsCount = $category->exists ? $category->posts()->count() : Post::count();
        $this->title = $category->exists ? $category->name : __('blog.all_posts');
    }
}; ?>

<div class="2xl:container max-w-7xl mx-auto">
    <x-post.loop :title='$this->title' :posts='$this->posts' />
</div>