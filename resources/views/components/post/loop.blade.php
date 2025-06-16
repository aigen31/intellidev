<div
    {{ $attributes->merge(['class'=>'flex gap-4 flex-col']) }}
    x-data="{ 
        observe() {
            let observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        if ($wire.perPage >= $wire.postsCount) {
                            this.loopLoad = false;
                            observer.unobserve($refs.bottom);
                            return;
                        }
                        $dispatch('loadMore');
                    }
                });
            });
            observer.observe($refs.bottom);
        },
        loopLoad: true
    }"
    x-init="observe">
    <h2 class="text-2xl font-bold uppercase tracking-wider">{{$title}}</h2>
    <div class="flex flex-col gap-4">
        @foreach ($posts as $post)
        <x-post.card>
            <x-post.card.header :image='$post->thumbnail'></x-post.card.header>
            <x-post.card.body :author='$post->user->name' :title="$post->translation()->title" :excerpt="$post->excerpt" :date='$post->created_at' :categories='$post->categories' :post-id='$post->id'></x-post.card.body>
        </x-post.card>
        @endforeach
    </div>
    <div x-show="loopLoad" x-ref="bottom" class="h-10 mt-4 flex justify-center items-center text-gray-500">
        <svg class="animate-spin h-5 w-5 mr-2 text-gray-400" viewBox="0 0 24 24">...</svg>
        Загрузка...
    </div>
</div>