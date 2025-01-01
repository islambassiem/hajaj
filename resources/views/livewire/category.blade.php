<div>
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4">
        @foreach ($posts as $post)
            <a href ="{{ route('post', $post->id) }}" class="group flex rounded-md max-w-sm flex-col overflow-hidden border border-neutral-300 bg-neutral-50 text-neutral-600 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-300 mx-auto">
                <div class="overflow-hidden">
                    <img src="{{ $post->getFirstMediaUrl() }}" class="object-cover transition duration-700 ease-out group-hover:scale-105 w-[600px] h-[400px]" alt="{{ $post->title }}" />
                </div>
                <div class="flex flex-col gap-4 p-6">
                    <span class="text-sm font-medium">{{ $post->category->name }}</span>
                    <h3 class="text-balance text-xl lg:text-2xl font-bold text-neutral-900 dark:text-white" aria-describedby="featureDescription">{{ Str::limit($post->title, 50) }}</h3>
                    <p class="text-pretty text-sm">
                        {{ Str::limit($post->description, 100) }}
                    </p>
                </div>
            </a>
        @endforeach
    </div>
    <div x-intersect.full="$wire.load()"></div>
</div>
