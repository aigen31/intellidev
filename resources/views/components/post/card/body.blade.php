<div {{ $attributes->merge(['class'=>'lg:h-full lg:w-3/5 md:px-10 md:py-7 px-6 py-6 flex flex-col']) }}>
    <div class="md:text-base text-sm text-gray-400 flex items-center justify-between gap-4 lg:mb-10 mb-7">
        <div class="flex flex-row items-center">
            <x-icon name="user" class="md:block hidden mr-2" />
            {{ $author }}
        </div>
        <div class="flex flex-row items-center">
            <x-icon name="clock" class="md:block hidden mr-2" />
            {{ $date }}
        </div>
    </div>
    <h2 class="2xl:text-5xl xl:text-4xl lg:text-2xl md:text-xl lg:mb-10 mb-5 uppercase font-bold tracking-wider">
        {{ $title }}
    </h2>
    <p class="lg:text-xl tracking-wide">
        {{ $excerpt }}
    </p>
    <x-post.card.footer :categories='$categories' :post='$postId'></x-post.card.footer>
</div>