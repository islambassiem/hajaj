<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Upload the images') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <x-file-uploader :post_id="$post_id" />
            <ul id="message" class="text-sm text-red-500 py-2"></ul>`
            <div class="float-end">
                <a href="{{ route('dashboard') }}" class="border border-indigo-500 bg-indigo-500 text-gray-200 rounded-xl px-4 py-2 hover:bg-indigo-300 hover:text-white hover:border-neutral-100">{{ __('Finish') }}</a>
            </div>
        </div>
    </div>
</div>
