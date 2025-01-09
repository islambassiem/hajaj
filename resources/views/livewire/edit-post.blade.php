<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create an Ad') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 m-6">
                <form id="postForm" action="{{ route('create.post') }}" method="post" enctype="multipart/form-data"
                    wire:submit="save">
                    @csrf
                    <div class="grid grid-cols-12 gap-2">
                        <div class="col-span-12 lg:col-span-6">
                            <div
                                class="flex w-full lg:max-w-lg flex-col gap-1 text-neutral-600 dark:text-neutral-300 mb-5">
                                <label for="title"
                                    class="flex w-fit items-center gap-1 text-sm @error('title') text-red-500 @enderror">
                                    @error('title')
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" aria-hidden="true"
                                            fill="currentColor" class="w-4 h-4">
                                            <path
                                                d="M5.28 4.22a.75.75 0 0 0-1.06 1.06L6.94 8l-2.72 2.72a.75.75 0 1 0 1.06 1.06L8 9.06l2.72 2.72a.75.75 0 1 0 1.06-1.06L9.06 8l2.72-2.72a.75.75 0 0 0-1.06-1.06L8 6.94 5.28 4.22Z" />
                                        </svg>
                                    @enderror
                                    {{ __('Title') }}
                                </label>
                                <input wire:model="title" id="title" type="text"
                                    class="@error('title') border-red-500 placeholder:text-red-500 @enderror w-full rounded-md border bg-neutral-50 px-2 pt-2 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700 dark:bg-neutral-900/50 dark:focus-visible:outline-white"
                                    placeholder="{{ __('Title to your Ad') }}" autocomplete="title" />
                                @error('title')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div
                                class="flex w-full lg:max-w-lg flex-col gap-1 text-neutral-600 dark:text-neutral-300 mb-5">
                                <label for="description"
                                    class="flex w-fit items-center gap-1 text-sm @error('price') text-red-500 @enderror">
                                    @error('price')
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" aria-hidden="true"
                                            fill="currentColor" class="w-4 h-4">
                                            <path
                                                d="M5.28 4.22a.75.75 0 0 0-1.06 1.06L6.94 8l-2.72 2.72a.75.75 0 1 0 1.06 1.06L8 9.06l2.72 2.72a.75.75 0 1 0 1.06-1.06L9.06 8l2.72-2.72a.75.75 0 0 0-1.06-1.06L8 6.94 5.28 4.22Z" />
                                        </svg>
                                    @enderror
                                    {{ __('Price') }}
                                </label>
                                <input wire:model="price" id="price" type="number"
                                    class="@error('price') border-red-500 placeholder:text-red-500 @enderror w-full rounded-md border bg-neutral-50 px-2 py-2 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700 dark:bg-neutral-900/50 dark:focus-visible:outline-white"
                                    placeholder="{{ __('Approximate price for your good') }}" autocomplete="price" />
                                @error('price')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div
                                class="relative flex w-full lg:max-w-lg flex-col gap-1 text-neutral-600 dark:text-neutral-300 mb-5">
                                <label for="parent" class="w-fit pl-0.5 text-sm">{{ __('Category') }}</label>
                                <select wire:model.live="patentId" id="parent"
                                    class="w-full appearance-none rounded-md border border-neutral-300 bg-neutral-50 py-2 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700 dark:bg-neutral-900/50 dark:focus-visible:outline-white">
                                    <option selected>{{ __('Choose') }}</option>
                                    @foreach ($this->parents as $parent)
                                        <option value="{{ $parent->id }}">
                                            {{ app()->getLocale() === 'en' ? Str::ucfirst($parent->name_en) : $parent->name_ar }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div
                                class="relative flex w-full lg:max-w-lg flex-col gap-1 text-neutral-600 dark:text-neutral-300">
                                <label for="child" class="w-fit pl-0.5 text-sm">{{ __('Sub category') }}</label>
                                <select wire:model.live="childId" id="child"
                                    class="w-full appearance-none rounded-md border border-neutral-300 bg-neutral-50 py-2 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700 dark:bg-neutral-900/50 dark:focus-visible:outline-white">
                                    <option selected>{{ __('Choose') }}</option>
                                    @foreach ($this->children as $child)
                                        <option value="{{ $child->id }}">
                                            {{ app()->getLocale() === 'en' ? Str::ucfirst($child->name_en) : $child->name_ar }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('childId')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-span-12 lg:col-span-6">

                            <div
                                class="flex w-full lg:max-w-lg flex-col gap-1 text-neutral-600 dark:text-neutral-300 mb-5">
                                <label for="description"
                                    class="flex w-fit items-center gap-1 text-sm @error('description') text-red-500 @enderror">
                                    @error('description')
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" aria-hidden="true"
                                            fill="currentColor" class="w-4 h-4">
                                            <path
                                                d="M5.28 4.22a.75.75 0 0 0-1.06 1.06L6.94 8l-2.72 2.72a.75.75 0 1 0 1.06 1.06L8 9.06l2.72 2.72a.75.75 0 1 0 1.06-1.06L9.06 8l2.72-2.72a.75.75 0 0 0-1.06-1.06L8 6.94 5.28 4.22Z" />
                                        </svg>
                                    @enderror
                                    {{ __('Description') }}
                                </label>
                                <textarea wire:model="description" id="description"
                                    class="@error('description') border-red-500 placeholder:text-red-500 @enderror w-full min-h-72 rounded-md border bg-neutral-50 px-2.5 py-2 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700 dark:bg-neutral-900/50 dark:focus-visible:outline-white"
                                    rows="10" placeholder="{{ __('All information about your good') }}"></textarea>
                                @error('description')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-12 gap-2">
                        @foreach ($images as $media)
                            <div x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false"
                                x-transition
                                class="col-span-12 sm:col-span-6 md:col-span-4 xl:col-span-3 relative group">
                                <button x-show="open" type="button"
                                    wire:confirm="{{ __('Are you sure you want to delete this image?') }}"
                                    wire:click="delete({{ $media->id }})"
                                    class="absolute top-0 right-0 rtl:left-0 z-20 flex justify-center items-center gap-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" class="size-8">
                                        <path fill="#afc4e1"
                                            d="M50,21H14v36c0,1.105,0.895,2,2,2h32c1.105,0,2-0.895,2-2V21z" />
                                        <path fill="#becde8" d="M39,59V21H14v36c0,1.104,0.895,2,2,2H39z" />
                                        <path fill="#cad8ed" d="M25,59V21H14v36c0,1.104,0.895,2,2,2H25z" />
                                        <path fill="#afc4e1" d="M14 21H50V24H14z" />
                                        <path fill="#8d6c9f"
                                            d="M48,60H16c-1.654,0-3-1.346-3-3V21c0-0.553,0.448-1,1-1h36c0.552,0,1,0.447,1,1v36 C51,58.654,49.654,60,48,60z M15,22v35c0,0.552,0.449,1,1,1h32c0.551,0,1-0.448,1-1V22H15z" />
                                        <path fill="#a8b7d1"
                                            d="M53,11H11c-1.105,0-2,0.895-2,2v6c0,1.105,0.895,2,2,2h42c1.105,0,2-0.895,2-2v-6 C55,11.895,54.105,11,53,11z" />
                                        <path fill="#8d6c9f"
                                            d="M53,22H11c-1.654,0-3-1.346-3-3v-6c0-1.654,1.346-3,3-3h42c1.654,0,3,1.346,3,3v6 C56,20.654,54.654,22,53,22z M11,12c-0.551,0-1,0.448-1,1v6c0,0.552,0.449,1,1,1h42c0.551,0,1-0.448,1-1v-6c0-0.552-0.449-1-1-1H11 z" />
                                        <path fill="#8d6c9f"
                                            d="M41 12c-.38 0-.743-.218-.911-.586l-2.335-5.137C37.57 6.1 37.323 6 37.063 6H26.937c-.26 0-.506.1-.691.277l-2.335 5.137c-.229.503-.822.726-1.324.496-.502-.229-.725-.821-.496-1.324l2.4-5.28c.037-.081.084-.157.142-.226C25.204 4.394 26.043 4 26.937 4h10.127c.893 0 1.733.394 2.305 1.08.057.068.105.145.142.226l2.4 5.28c.229.503.006 1.096-.496 1.324C41.28 11.972 41.139 12 41 12zM14 18c-.552 0-1-.447-1-1v-2c0-.553.448-1 1-1s1 .447 1 1v2C15 17.553 14.552 18 14 18zM19 18c-.552 0-1-.447-1-1v-2c0-.553.448-1 1-1s1 .447 1 1v2C20 17.553 19.552 18 19 18zM24 18c-.552 0-1-.447-1-1v-2c0-.553.448-1 1-1s1 .447 1 1v2C25 17.553 24.552 18 24 18zM29 18c-.552 0-1-.447-1-1v-2c0-.553.448-1 1-1s1 .447 1 1v2C30 17.553 29.552 18 29 18zM35 18c-.552 0-1-.447-1-1v-2c0-.553.448-1 1-1s1 .447 1 1v2C36 17.553 35.552 18 35 18zM40 18c-.552 0-1-.447-1-1v-2c0-.553.448-1 1-1s1 .447 1 1v2C41 17.553 40.552 18 40 18zM45 18c-.552 0-1-.447-1-1v-2c0-.553.448-1 1-1s1 .447 1 1v2C46 17.553 45.552 18 45 18zM50 18c-.552 0-1-.447-1-1v-2c0-.553.448-1 1-1s1 .447 1 1v2C51 17.553 50.552 18 50 18zM38 56H14c-.552 0-1-.447-1-1s.448-1 1-1h24c.552 0 1 .447 1 1S38.552 56 38 56zM46 56h-4c-.552 0-1-.447-1-1s.448-1 1-1h4c.552 0 1 .447 1 1S46.552 56 46 56zM20 42c-.552 0-1-.447-1-1V29c0-.553.448-1 1-1s1 .447 1 1v12C21 41.553 20.552 42 20 42zM20 50c-.552 0-1-.447-1-1v-4c0-.553.448-1 1-1s1 .447 1 1v4C21 49.553 20.552 50 20 50zM28 50c-.552 0-1-.447-1-1V29c0-.553.448-1 1-1s1 .447 1 1v20C29 49.553 28.552 50 28 50zM36 50c-.552 0-1-.447-1-1V29c0-.553.448-1 1-1s1 .447 1 1v20C37 49.553 36.552 50 36 50zM44 50c-.552 0-1-.447-1-1V37c0-.553.448-1 1-1s1 .447 1 1v12C45 49.553 44.552 50 44 50zM44 34c-.552 0-1-.447-1-1v-4c0-.553.448-1 1-1s1 .447 1 1v4C45 33.553 44.552 34 44 34z" />
                                    </svg>
                                </button>
                                <img src="{{ $media->getUrl() }}" alt="{{ $media->name }}"
                                    class="object-cover w-full h-full rounded-lg shadow-xl group-hover:scale-105  transition duration-700 ease-out hover:opacity-25">
                            </div>
                        @endforeach
                    </div>
                </form>
                @if (count($images) < 10)
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto px-6 lg:px-8">
                            <form action="{{ route('image.upload') }}" id="my-dropzone"
                                class="dropzone border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg dark:text-neutral-200 bg-white dark:bg-gray-800">
                                @csrf
                                @method('POST')
                                <input type="hidden" name="post_id" value="{{ $this->post_id }}">
                                <div class="flex justify-center items-center" id="uploader">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="size-10 -mb-5 mt-7 text-indigo-500"
                                        viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0m-.5 14.5V11h1v3.5a.5.5 0 0 1-1 0" />
                                    </svg>
                                </div>
                            </form>
                            <ul id="message" class="text-sm text-red-500 py-2"></ul>
                        </div>
                    </div>
                @endif
                <div class="flex items-center justify-end mt-4">
                    <x-button type="submit" form="postForm">{{ __('Finish') }}</x-button>
                </div>
            </div>
        </div>
    </div>
    @section('scripts')
        <script>
            console.log(document.getElementById("my-dropzone"));

            let dropzone = new Dropzone("#my-dropzone", {
                paramName: "file",
                dictDefaultMessage: "{{ __('Drop files here to upload') }}",
                dictRemoveFile: "Remove",
                // maxFilesize: 2, // MB
                acceptedFiles: ".jpeg, .png, .jpg, .gif, .svg",
                addRemoveLinks: true,
                maxfilesexceeded: function(file) {
                    this.removeFile(file);
                    // this.removeAllFiles();
                },
                success: function(file, response) {
                    document.getElementById('uploader').style.display = 'none';
                    file.media = JSON.parse(file.xhr.response).media;
                    document.getElementById('message').innerHTML = '';
                },
                error: function(file, response) {
                    document.getElementById('uploader').style.display = 'none';
                    for (let i = 0; i < response.errors.file.length; i++) {
                        document.getElementById('message').innerHTML = response.errors.file[i];
                    };
                    this.removedfile(file)
                },
                removedfile(file) {
                    if (file.previewElement != null && file.previewElement.parentNode != null) {
                        file.previewElement.parentNode.removeChild(file.previewElement);
                    }
                    fetch("{{ route('image.delete') }}", {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            media: file.media
                        })
                    });
                    return this._updateMaxFilesReachedClass();
                },
            });
        </script>
    @endsection
</div>
