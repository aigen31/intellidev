<h2 class="text-2xl font-bold uppercase tracking-wider">{{$title}}</h2>
@foreach ($posts as $post)
<x-post.card>
    <x-post.card.header :image='$post->thumbnail'></x-post.card.header>
    <x-post.card.body :author='$post->user->name' :title='$post->title' :excerpt='$post->excerpt' :date='$post->created_at' :categories='$post->categories' :post-id='$post->id'></x-post.card.body>
</x-post.card>
@endforeach