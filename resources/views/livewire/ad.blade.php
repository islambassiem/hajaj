<div class="p-4 m-4">
    <form action="{{ route('ad') }}" method="post" enctype="multipart/form-data" wire:submit="save">
        @csrf
        @if ($success)
            <div class="relative w-full overflow-hidden rounded-md border border-green-500 bg-white text-neutral-600 dark:bg-neutral-950 dark:text-neutral-300"
                role="alert">
                <div class="flex w-full items-center gap-2 bg-green-500/10 p-4">
                    <div class="bg-green-500/15 text-green-500 rounded-full p-1" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-6"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-2">
                        <h3 class="text-sm font-semibold text-green-500">Ad successfully created</h3>
                        <p class="text-xs font-medium sm:text-sm">Success! You've posted your ad successfully. Wishing
                            you Good Luck</p>
                    </div>
                </div>
            </div>
        @endif
        <div class="grid grid-cols-12 gap-2 ">
            <div class="col-span-12 lg:col-span-6">
                <div class="flex w-full lg:max-w-lg flex-col gap-1 text-neutral-600 dark:text-neutral-300 mb-5">
                    <label for="title"
                        class="flex w-fit items-center gap-1 text-sm @error('title') text-red-500 @enderror">
                        @error('title')
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" aria-hidden="true"
                                fill="currentColor" class="w-4 h-4">
                                <path
                                    d="M5.28 4.22a.75.75 0 0 0-1.06 1.06L6.94 8l-2.72 2.72a.75.75 0 1 0 1.06 1.06L8 9.06l2.72 2.72a.75.75 0 1 0 1.06-1.06L9.06 8l2.72-2.72a.75.75 0 0 0-1.06-1.06L8 6.94 5.28 4.22Z" />
                            </svg>
                        @enderror
                        Title
                    </label>
                    <input wire:model.blur="title" id="title" type="text"
                        class="@error('title') border-red-500 placeholder:text-red-500 @enderror w-full rounded-md border bg-neutral-50 px-2 pt-2 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700 dark:bg-neutral-900/50 dark:focus-visible:outline-white"
                        placeholder="Enter your name" autocomplete="title" />
                    @error('title')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex w-full lg:max-w-lg flex-col gap-1 text-neutral-600 dark:text-neutral-300 mb-5">
                    <label for="description"
                        class="flex w-fit items-center gap-1 text-sm @error('price') text-red-500 @enderror">
                        @error('price')
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" aria-hidden="true"
                                fill="currentColor" class="w-4 h-4">
                                <path
                                    d="M5.28 4.22a.75.75 0 0 0-1.06 1.06L6.94 8l-2.72 2.72a.75.75 0 1 0 1.06 1.06L8 9.06l2.72 2.72a.75.75 0 1 0 1.06-1.06L9.06 8l2.72-2.72a.75.75 0 0 0-1.06-1.06L8 6.94 5.28 4.22Z" />
                            </svg>
                        @enderror
                        Price
                    </label>
                    <input wire:model.blur="price" id="price" type="number"
                        class="@error('price') border-red-500 placeholder:text-red-500 @enderror w-full rounded-md border bg-neutral-50 px-2 py-2 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700 dark:bg-neutral-900/50 dark:focus-visible:outline-white"
                        placeholder="Enter your name" autocomplete="price" />
                    @error('price')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex w-full lg:max-w-lg flex-col gap-1 text-neutral-600 dark:text-neutral-300 mb-5">
                    <label for="description"
                        class="flex w-fit items-center gap-1 text-sm @error('description') text-red-500 @enderror">
                        @error('description')
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" aria-hidden="true"
                                fill="currentColor" class="w-4 h-4">
                                <path
                                    d="M5.28 4.22a.75.75 0 0 0-1.06 1.06L6.94 8l-2.72 2.72a.75.75 0 1 0 1.06 1.06L8 9.06l2.72 2.72a.75.75 0 1 0 1.06-1.06L9.06 8l2.72-2.72a.75.75 0 0 0-1.06-1.06L8 6.94 5.28 4.22Z" />
                            </svg>
                        @enderror
                        Description
                    </label>
                    <textarea wire:model.blur="description" id="description"
                        class="@error('description') border-red-500 placeholder:text-red-500 @enderror w-full rounded-md border bg-neutral-50 px-2.5 py-2 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700 dark:bg-neutral-900/50 dark:focus-visible:outline-white"
                        rows="3" placeholder="We'd love to hear from you..."></textarea>
                    @error('description')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div
                    class="relative flex w-full lg:max-w-lg flex-col gap-1 text-neutral-600 dark:text-neutral-300 mb-5">
                    <label for="parent" class="w-fit pl-0.5 text-sm">Operating System</label>
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

                <div class="relative flex w-full lg:max-w-lg flex-col gap-1 text-neutral-600 dark:text-neutral-300">
                    <label for="child" class="w-fit pl-0.5 text-sm">Operating System</label>
                    <select wire:model="childId" id="child"
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
        </div>
        <div class="flex items-center justify-end mt-4">
            <button type="submit">Submit</button>
        </div>
    </form>

</div>

