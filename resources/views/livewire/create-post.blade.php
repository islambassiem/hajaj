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
                                    placeholder="{{ __('Approximate price for your product') }}" autocomplete="price" />
                                @error('price')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="grid grid-cols-12 gap-2 lg:max-w-lg">
                                <div
                                    class="col-span-6 relative flex w-full lg:max-w-lg flex-col gap-1 text-neutral-600 dark:text-neutral-300 mb-5">
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
                                    class="col-span-6 relative flex w-full lg:max-w-lg flex-col gap-1 text-neutral-600 dark:text-neutral-300">
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

                            <div class="grid grid-cols-12 gap-2 lg:max-w-lg">
                                <div
                                    class="col-span-6 relative flex w-full lg:max-w-lg flex-col gap-1 text-neutral-600 dark:text-neutral-300 mb-5">
                                    <label for="parent" class="w-fit pl-0.5 text-sm">{{ __('Province') }}</label>
                                    <select wire:model.live="provinceId" id="province"
                                        class="w-full appearance-none rounded-md border border-neutral-300 bg-neutral-50 py-2 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700 dark:bg-neutral-900/50 dark:focus-visible:outline-white">
                                        <option selected>{{ __('Choose') }}</option>
                                        @foreach ($this->provinces as $province)
                                            <option value="{{ $province->id }}">
                                                {{ app()->getLocale() === 'en' ? Str::ucfirst($province->city_en) : $province->city_ar }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div
                                    class="col-span-6 relative flex w-full lg:max-w-lg flex-col gap-1 text-neutral-600 dark:text-neutral-300">
                                    <label for="child" class="w-fit pl-0.5 text-sm">{{ __('City') }}</label>
                                    <select wire:model.live="cityId" id="city"
                                        class="w-full appearance-none rounded-md border border-neutral-300 bg-neutral-50 py-2 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700 dark:bg-neutral-900/50 dark:focus-visible:outline-white">
                                        <option selected>{{ __('Choose') }}</option>
                                        @foreach ($this->cities as $city)
                                            <option value="{{ $city->id }}">
                                                {{ app()->getLocale() === 'en' ? Str::ucfirst($city->city_en) : $city->city_ar }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('cityId')
                                        <span class="text-sm text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
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
                                    rows="10" placeholder="{{ __('All information about your product') }}"></textarea>
                                @error('description')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-button type="submit">{{ __('Next') }}</x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
