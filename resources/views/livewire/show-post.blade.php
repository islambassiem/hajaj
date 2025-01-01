<div class="border-2 border-dashed p-4 rounded-lg ">
    <h2 class="text-2xl font-bold py-4">{{ $post->title }}</h2>
    <!-- Alpine.js Carousel -->
    <div x-data="{ currentSlide: 0 }" class="relative w-full max-w-lg mx-auto">
        <div class="relative overflow-hidden">
            <!-- Images -->
            <div class="flex transition-transform duration-500 ease-in-out"
                :style="`transform: translateX(-${currentSlide * 100}%)`">
                @foreach ($post->getMedia() as $media)
                    <img src="{{ $media->getUrl() }}" alt="Media {{ $loop->index + 1 }}" class="w-full">
                @endforeach
            </div>
        </div>

        <!-- previous button -->
        <button type="button"
            class="absolute left-5 top-1/2 z-20 flex rounded-full -translate-y-1/2 items-center justify-center bg-white/40 p-2 text-neutral-600 transition hover:bg-white/60 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:outline-offset-0 dark:bg-neutral-950/40 dark:text-neutral-300 dark:hover:bg-neutral-950/60 dark:focus-visible:outline-white"
            aria-label="previous slide" x-on:click="currentSlide = (currentSlide === 0) ? {{ $post->media->count() - 1 }} : currentSlide - 1">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                stroke-width="3" class="size-5 md:size-6 pr-0.5" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
        </button>

        <!-- next button -->
        <button type="button"
            class="absolute right-5 top-1/2 z-20 flex rounded-full -translate-y-1/2 items-center justify-center bg-white/40 p-2 text-neutral-600 transition hover:bg-white/60 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:outline-offset-0 dark:bg-neutral-950/40 dark:text-neutral-300 dark:hover:bg-neutral-950/60 dark:focus-visible:outline-white"
            aria-label="next slide" x-on:click="currentSlide = (currentSlide === {{ $post->media->count() - 1 }}) ? 0 : currentSlide + 1">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                stroke-width="3" class="size-5 md:size-6 pl-0.5" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        </button>

        <!-- Indicators -->
        <div class="flex justify-center mt-2 space-x-2">
            @foreach ($post->media as $index => $media)
                <button x-on:click="currentSlide = {{ $index }}"
                    :class="currentSlide === {{ $index }} ? 'bg-blue-500' : 'bg-gray-300'"
                    class="w-3 h-3 rounded-full">
                </button>
            @endforeach
        </div>
    </div>
    <p class="py-4 text-justify text-lg">{{ $post->description }}</p>
</div>
