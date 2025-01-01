<div class="dark:text-white p-4 grid grid-cols-12 gap-2">
    <div class="col-span-12 lg:col-span-8">
        <livewire:show-post :post="$post">
    </div>

    <div class="p-4 col-span-12 lg:col-span-4  border-2 border-dashed rounded-lg  dark:text-white">
        <div class="text-2xl font-bold mb-5">Similar Products</div>
        <div>
            @foreach ($similar as $item)
                <a href="{{ route('post', $item->id) }}">
                    <div class="py-3">{{ Str::limit($item->title, 20, '...') }}</div>
                    <div class="overflow-hidden group">
                        <img src="{{ $item->getFirstMediaUrl() }}" class="object-cover transition duration-700 ease-out group-hover:scale-105" alt="{{ $item->title }}" />
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <div x-intersect.full="$wire.load()"></div>

</div>
