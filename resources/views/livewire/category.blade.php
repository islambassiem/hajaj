<div>
    <div class="rounded-xl p-5 mb-3">
        <form wire:submit="query">
            <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input wire:model="search" type="search" id="search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" />
                {{--  <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>  --}}
            </div>
        </form>
    </div>
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4">
        @if($posts->count() > 0)
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
        @else
            <div class="ps-3 text-gray-700 dark:text-neutral-300 text-xl font-bold">{{ __('Please try again later') }}</div>
        @endif
    </div>
    <div x-intersect.full="$wire.load()"></div>
</div>
