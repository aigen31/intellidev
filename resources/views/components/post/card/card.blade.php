<div {{ $attributes->merge([
    'class' => 'bg-gray-200 xl:h-[50vh] lg:h-[30vh] rounded-lg bg-cover bg-center overflow-hidden flex flex-col lg:flex-row even:lg:flex-row-reverse'
]) }}>
    {{ $slot }}
</div>