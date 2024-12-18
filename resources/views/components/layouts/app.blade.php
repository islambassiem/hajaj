<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr" x-cloak x-data="{
    darkMode: localStorage.getItem('dark') === 'true',
    dir: localStorage.getItem('direction') || 'ltr',
    toggleDirection() {
        this.dir = this.dir === 'ltr' ? 'rtl' : 'ltr';
        document.documentElement.setAttribute('dir', this.dir);
        localStorage.setItem('direction', this.dir);
    },

}"
    x-init="$watch('darkMode', val => localStorage.setItem('dark', val));
    document.documentElement.setAttribute('dir', dir)" x-bind:class="{ 'dark': darkMode }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <title>{{ $title ?? env('APP_NAME') }}</title>
</head>

<body>
    <div x-data="{ sidebarIsOpen: false }" class="relative flex w-full flex-col md:flex-row">
        <!-- This allows screen readers to skip the sidebar and go directly to the main content. -->
        <a class="sr-only" href="#main-content">skip to the main content</a>

        <!-- dark overlay for when the sidebar is open on smaller screens  -->
        <div x-cloak x-show="sidebarIsOpen" class="fixed inset-0 z-20 bg-neutral-950/10 backdrop-blur-sm md:hidden"
            aria-hidden="true" x-on:click="sidebarIsOpen = false" x-transition.opacity></div>

        <nav x-cloak
            class="fixed left-0 z-30 flex h-svh w-60 shrink-0 flex-col ltr:border-r rtl:border-l border-neutral-300 bg-neutral-50 p-4 transition-transform duration-300 md:w-64 md:translate-x-0 md:relative dark:border-neutral-700 dark:bg-neutral-900"
            x-bind:class="sidebarIsOpen ? 'translate-x-0' : '-translate-x-60'" aria-label="sidebar navigation">
            <!-- logo  -->
            <a href="#"
                class="ml-2 w-fit text-2xl font-bold text-neutral-900 dark:text-white flex items-center gap-2">
                <span class="sr-only">homepage</span>
                {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 376 155" fill="none" class="w-24"
                    aria-hidden="true">
                    <path
                        d="M54.009 101.344C54.137 103.733 54.777 105.867 55.929 107.744C57.081 109.621 58.745 111.093 60.921 112.16C63.1397 113.227 65.785 113.76 68.857 113.76C71.6303 113.76 74.0623 113.419 76.153 112.736C78.2863 112.053 80.0783 111.221 81.529 110.24C83.0223 109.216 84.1317 108.235 84.857 107.296L91.577 117.28C90.3823 118.773 88.7823 120.16 86.777 121.44C84.8143 122.677 82.297 123.659 79.225 124.384C76.1957 125.152 72.3983 125.536 67.833 125.536C62.073 125.536 57.017 124.405 52.665 122.144C48.313 119.883 44.921 116.619 42.489 112.352C40.057 108.085 38.841 103.008 38.841 97.12C38.841 92 39.929 87.392 42.105 83.296C44.281 79.1573 47.4383 75.8933 51.577 73.504C55.7583 71.1147 60.7717 69.92 66.617 69.92C72.121 69.92 76.8783 70.9867 80.889 73.12C84.9423 75.2107 88.0783 78.2827 90.297 82.336C92.5157 86.3893 93.625 91.3387 93.625 97.184C93.625 97.5253 93.6037 98.2293 93.561 99.296C93.561 100.32 93.5183 101.003 93.433 101.344H54.009ZM78.393 91.296C78.3503 89.9307 77.9237 88.4587 77.113 86.88C76.345 85.3013 75.129 83.9573 73.465 82.848C71.801 81.7387 69.5823 81.184 66.809 81.184C64.0357 81.184 61.753 81.7173 59.961 82.784C58.2117 83.8507 56.889 85.1733 55.993 86.752C55.097 88.288 54.585 89.8027 54.457 91.296H78.393ZM134.234 69.92C137.818 69.92 141.317 70.6667 144.73 72.16C148.143 73.6107 150.938 75.936 153.114 79.136C155.333 82.336 156.442 86.5173 156.442 91.68V124H140.122V94.496C140.122 90.1867 139.098 86.9867 137.05 84.896C135.045 82.8053 132.399 81.76 129.114 81.76C126.981 81.76 124.933 82.3573 122.97 83.552C121.05 84.704 119.471 86.3253 118.234 88.416C117.039 90.464 116.442 92.8107 116.442 95.456V124H100.186V71.456H116.442V79.84C116.911 78.3893 117.978 76.896 119.642 75.36C121.306 73.824 123.418 72.544 125.978 71.52C128.538 70.4533 131.29 69.92 134.234 69.92ZM189.297 152.096C185.457 152.096 181.766 151.733 178.225 151.008C174.726 150.283 171.548 149.152 168.689 147.616C165.83 146.08 163.441 144.075 161.521 141.6L171.377 131.616C172.273 132.768 173.425 133.92 174.833 135.072C176.284 136.267 178.118 137.248 180.337 138.016C182.556 138.827 185.329 139.232 188.657 139.232C191.814 139.232 194.524 138.613 196.785 137.376C199.089 136.181 200.86 134.475 202.097 132.256C203.377 130.037 204.017 127.456 204.017 124.512V123.04H219.953V125.472C219.953 131.275 218.588 136.16 215.857 140.128C213.126 144.096 209.457 147.083 204.849 149.088C200.241 151.093 195.057 152.096 189.297 152.096ZM204.017 124V114.848C203.633 115.787 202.652 117.109 201.073 118.816C199.494 120.523 197.361 122.08 194.673 123.488C192.028 124.853 188.913 125.536 185.329 125.536C180.294 125.536 175.836 124.341 171.953 121.952C168.07 119.52 165.02 116.213 162.801 112.032C160.625 107.808 159.537 103.051 159.537 97.76C159.537 92.4693 160.625 87.7333 162.801 83.552C165.02 79.328 168.07 76 171.953 73.568C175.836 71.136 180.294 69.92 185.329 69.92C188.828 69.92 191.857 70.5173 194.417 71.712C197.02 72.864 199.11 74.2293 200.689 75.808C202.31 77.344 203.356 78.7307 203.825 79.968V71.456H219.953V124H204.017ZM175.473 97.76C175.473 100.704 176.134 103.307 177.457 105.568C178.78 107.787 180.529 109.515 182.705 110.752C184.881 111.989 187.249 112.608 189.809 112.608C192.497 112.608 194.886 111.989 196.977 110.752C199.068 109.472 200.71 107.723 201.905 105.504C203.142 103.243 203.761 100.661 203.761 97.76C203.761 94.8587 203.142 92.2987 201.905 90.08C200.71 87.8187 199.068 86.048 196.977 84.768C194.886 83.488 192.497 82.848 189.809 82.848C187.249 82.848 184.881 83.488 182.705 84.768C180.529 86.0053 178.78 87.7547 177.457 90.016C176.134 92.2347 175.473 94.816 175.473 97.76ZM346.854 69.92C350.438 69.92 353.937 70.6667 357.35 72.16C360.763 73.6107 363.558 75.936 365.734 79.136C367.953 82.336 369.062 86.5173 369.062 91.68V124H352.742V94.496C352.742 90.1867 351.718 86.9867 349.67 84.896C347.665 82.8053 345.019 81.76 341.734 81.76C339.601 81.76 337.553 82.3573 335.59 83.552C333.67 84.704 332.091 86.3253 330.854 88.416C329.659 90.464 329.062 92.8107 329.062 95.456V124H312.806V71.456H329.062V79.84C329.531 78.3893 330.598 76.896 332.262 75.36C333.926 73.824 336.038 72.544 338.598 71.52C341.158 70.4533 343.91 69.92 346.854 69.92Z"
                        class="fill-neutral-900 dark:fill-white"></path>
                    <path
                        d="M242.508 96.608C242.508 101.301 243.447 105.056 245.324 107.872C247.201 110.645 250.231 112.032 254.412 112.032C258.636 112.032 261.687 110.645 263.564 107.872C265.441 105.056 266.38 101.301 266.38 96.608V71.456H282.38V98.464C282.38 103.883 281.292 108.64 279.116 112.736C276.94 116.789 273.761 119.947 269.58 122.208C265.441 124.427 260.385 125.536 254.412 125.536C248.481 125.536 243.425 124.427 239.244 122.208C235.105 119.947 231.948 116.789 229.772 112.736C227.596 108.64 226.508 103.883 226.508 98.464V71.456H242.508V96.608ZM288.739 124V71.456H304.931V124H288.739ZM297.059 57.888C294.371 57.888 292.088 56.9493 290.211 55.072C288.376 53.1947 287.459 50.9547 287.459 48.352C287.459 45.7493 288.398 43.488 290.275 41.568C292.152 39.648 294.414 38.688 297.059 38.688C298.808 38.688 300.408 39.136 301.859 40.032C303.31 40.8853 304.483 42.0373 305.379 43.488C306.275 44.9387 306.723 46.56 306.723 48.352C306.723 50.9547 305.763 53.1947 303.843 55.072C301.966 56.9493 299.704 57.888 297.059 57.888Z"
                        class="fill-black dark:fill-white"></path>
                    <g>
                        <path
                            d="M36.9195 49.9344C37.7242 49.9344 38.3765 49.2951 38.3765 48.5065C38.3765 47.7179 37.7242 47.0786 36.9195 47.0786C36.1147 47.0786 35.4624 47.7179 35.4624 48.5065C35.4624 49.2951 36.1147 49.9344 36.9195 49.9344Z"
                            class="fill-neutral-900 dark:fill-white"></path>
                        <path
                            d="M68.6288 43.4241C65.7147 38.8016 61.4918 35.244 55.9846 32.7512C50.4528 30.2585 43.7849 29.0242 35.981 29.0242H4V126.024H19.6324C17.8049 112.471 18.2742 101.048 19.8547 91.7063C14.7427 95.7238 12.446 101.46 12.446 101.46C8.24767 90.6415 17.1135 80.0896 24.1024 75.6607C24.7445 73.9908 25.4112 72.4419 26.0533 71.014C29.6589 62.7854 27.1646 56.9528 23.4109 53.0806C18.9903 48.5307 12.8411 46.643 12.8411 46.643C12.8411 46.643 15.9034 41.1734 26.1027 46.8124C27.1152 47.369 28.3747 47.3448 29.3626 46.7398C30.0787 46.3041 30.8443 45.9411 31.6346 45.6023C37.5369 43.0611 44.2541 43.3999 49.3661 46.6672C55.1203 50.3458 62.2079 56.8076 58.3554 69.2715C57.7874 69.5619 56.2563 70.0701 55.7377 70.3363C48.5265 74.1844 40.4263 82.1709 42.2538 92.2146C42.2538 92.2146 47.6621 83.6956 56.7255 82.1225C56.7255 82.1225 70.9749 78.4197 72.8024 63.1969C72.9012 62.1078 73 61.0429 73 59.9054C73 53.5162 71.5429 48.0225 68.6041 43.4241H68.6288Z"
                            class="fill-neutral-900 dark:fill-white"></path>
                    </g>
                </svg> --}}
                <x-application-mark class="block h-9 w-auto mx-auto" />
                <span class="text-gray-400">{{ env('APP_NAME', 'My App')}}</span>
            </a>

            <!-- search  -->
            <div class="relative my-4 flex w-full max-w-xs flex-col gap-1 text-neutral-600 dark:text-neutral-300">
                {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none"
                    stroke-width="2"
                    class="absolute left-2 top-1/2 size-5 -translate-y-1/2 text-neutral-600/50 dark:text-neutral-300/50"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
                <input type="search"
                    class="w-full border border-neutral-300 rounded-md bg-white px-2 py-1.5 pl-9 text-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:cursor-not-allowed disabled:opacity-75 dark:border-neutral-700 dark:bg-neutral-950/50 dark:focus-visible:outline-white"
                    name="search" aria-label="Search" placeholder="Search" /> --}}
                <div class="mt-6"><a href="{{ route('category') }}">Browse All</a></div>
            </div>

            <!-- sidebar links  -->
            <div class="flex flex-col gap-2 overflow-y-auto pb-6" id="sidebar">
                @foreach ($categories as $category)
                    <a href="#"
                        class="flex items-center gap-2 px-2 py-1.5 text-sm rounded-md font-medium text-neutral-600 underline-offset-2 hover:bg-black/5 hover:text-neutral-900 focus-visible:underline focus:outline-none dark:text-neutral-300 dark:hover:bg-white/5 dark:hover:text-white">
                        <span>{{ Str::ucfirst($category->name) }}</span>
                    </a>
                    @if ($category->children->isNotEmpty())
                        <ul class="pl-4">
                            @foreach ($category->children as $child)
                                <li
                                    class="ltr:border-l-2 rtl:border-r-2 px-2 py-0.5 border-neutral-300 dark:border-neutral-700 {{ $activeCategory?->slug === $child->slug ? 'bg-black/5 text-neutral-900 dark:bg-white/5 dark:text-white border-x-indigo-500 dark:border-white' : '' }}">
                                    <a href="{{ route('category', $child->slug) }}"
                                        class="flex items-center gap-2 px-2 py-1.5 text-sm rounded-md text-neutral-600 underline-offset-2 hover:bg-black/5 hover:text-neutral-900 focus-visible:underline focus:outline-none dark:text-neutral-300 dark:hover:bg-white/5 dark:hover:text-white">
                                        <span>{{ Str::ucfirst($child->name) }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                @endforeach
            </div>
        </nav>

        <!-- top navbar & main content  -->
        <div class="h-svh w-full overflow-y-auto bg-white dark:bg-neutral-950">
            <!-- top navbar  -->
            <nav class="sticky top-0 z-10 flex items-center justify-between border-b border-neutral-300 bg-neutral-50 px-4 py-2 dark:border-neutral-700 dark:bg-neutral-900"
                aria-label="top navigation bar">

                <!-- sidebar toggle button for small screens  -->
                <button type="button" class="md:hidden inline-block text-neutral-600 dark:text-neutral-300"
                    x-on:click="sidebarIsOpen = true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-5"
                        aria-hidden="true">
                        <path
                            d="M0 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5-1v12h9a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1zM4 2H2a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h2z" />
                    </svg>
                    <span class="sr-only">sidebar toggle</span>
                </button>

                <div class="flex justify-between flex-1">
                    <!-- breadcrumbs  -->
                    @isset($activeCategory)
                        <nav class="hidden md:inline-block text-sm font-medium text-neutral-600 dark:text-neutral-300 mt-5"
                            aria-label="breadcrumb">
                            <ol class="flex flex-wrap items-center gap-1">
                                <li class="flex items-center gap-1">
                                    <a href="#"
                                        class="hover:text-neutral-900 dark:hover:text-white">{{ Str::ucfirst($activeCategory->parent->name) }}</a>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor"
                                        fill="none" stroke-width="2" class="size-4" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                    </svg>
                                </li>
                                <li class="flex items-center gap-1 font-bold text-neutral-900 dark:text-white"
                                    aria-current="page">{{ Str::ucfirst($activeCategory->name) }}</li>
                            </ol>
                        </nav>
                    @else
                        <div class="dark:text-neutral-300 flex items-center text-sm ms-2 font-bold">
                            {{ __('Browse All Market Place') }}
                        </div>
                    @endisset

                    <div class="flex gap-5 items-center ms-auto" x-cloak>
                        <div @click="toggleDirection()">
                            <a href="{{ route('lang', 'ar') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                                    class="size-8 rtl:hidden ltr:inline-block ">
                                    <path d="M5,4h6V28H5c-2.208,0-4-1.792-4-4V8c0-2.208,1.792-4,4-4Z" fill="#ea3323">
                                    </path>
                                    <path d="M10,20v8H27c2.209,0,4-1.791,4-4v-4H10Z"></path>
                                    <path fill="#fff" d="M10 11H31V21H10z"></path>
                                    <path d="M27,4H10V12H31v-4c0-2.209-1.791-4-4-4Z" fill="#317234"></path>
                                    <path
                                        d="M27,4H5c-2.209,0-4,1.791-4,4V24c0,2.209,1.791,4,4,4H27c2.209,0,4-1.791,4-4V8c0-2.209-1.791-4-4-4Zm3,20c0,1.654-1.346,3-3,3H5c-1.654,0-3-1.346-3-3V8c0-1.654,1.346-3,3-3H27c1.654,0,3,1.346,3,3V24Z"
                                        opacity=".15"></path>
                                    <path
                                        d="M27,5H5c-1.657,0-3,1.343-3,3v1c0-1.657,1.343-3,3-3H27c1.657,0,3,1.343,3,3v-1c0-1.657-1.343-3-3-3Z"
                                        fill="#fff" opacity=".2"></path>
                                </svg>
                            </a>
                            <a href="{{ route('lang', 'en') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                                    class="size-8 rtl:inline-block ltr:hidden">
                                    <path fill="#fff" d="M8 4H24V28H8z"></path>
                                    <path d="M5,4h4V28H5c-2.208,0-4-1.792-4-4V8c0-2.208,1.792-4,4-4Z" fill="#c53a28">
                                    </path>
                                    <path d="M27,4h4V28h-4c-2.208,0-4-1.792-4-4V8c0-2.208,1.792-4,4-4Z"
                                        transform="rotate(180 27 16)" fill="#c53a28"></path>
                                    <path
                                        d="M27,4H5c-2.209,0-4,1.791-4,4V24c0,2.209,1.791,4,4,4H27c2.209,0,4-1.791,4-4V8c0-2.209-1.791-4-4-4Zm3,20c0,1.654-1.346,3-3,3H5c-1.654,0-3-1.346-3-3V8c0-1.654,1.346-3,3-3H27c1.654,0,3,1.346,3,3V24Z"
                                        opacity=".15"></path>
                                    <path
                                        d="M16.275,22.167l-.138-2.641c-.007-.16,.117-.296,.277-.304,.021,0,.042,0,.063,.004l2.629,.462-.355-.979c-.03-.08-.005-.17,.061-.223l2.88-2.332-.649-.303c-.091-.043-.135-.146-.104-.242l.569-1.751-1.659,.352c-.093,.019-.186-.029-.223-.116l-.321-.756-1.295,1.389c-.076,.08-.201,.083-.281,.007-.049-.047-.071-.115-.058-.182l.624-3.22-1.001,.578c-.095,.056-.217,.024-.272-.071-.002-.004-.004-.008-.006-.012l-1.016-1.995-1.016,1.995c-.049,.098-.169,.138-.267,.089-.004-.002-.008-.004-.012-.006l-1.001-.578,.624,3.22c.021,.108-.05,.212-.158,.233-.067,.013-.135-.009-.182-.058l-1.295-1.389-.321,.756c-.037,.087-.131,.136-.223,.116l-1.659-.352,.569,1.751c.031,.095-.013,.199-.104,.242l-.649,.303,2.88,2.332c.066,.054,.091,.144,.061,.223l-.355,.979,2.629-.462c.158-.027,.309,.079,.336,.237,.004,.021,.005,.042,.004,.063l-.138,2.641h.551Z"
                                        fill="#c53a28"></path>
                                    <path
                                        d="M27,5H5c-1.657,0-3,1.343-3,3v1c0-1.657,1.343-3,3-3H27c1.657,0,3,1.343,3,3v-1c0-1.657-1.343-3-3-3Z"
                                        fill="#fff" opacity=".2"></path>
                                </svg>
                            </a>
                        </div>


                        <button @click="darkMode = !darkMode">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16"
                                class="text-neutral-100 size-7 hidden dark:block" class="size-7">
                                <path
                                    d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708" />
                            </svg>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                class="size-5 block dark:hidden" viewBox="0 0 16 16">
                                <path
                                    d="M6 .278a.77.77 0 0 1 .08.858 7.2 7.2 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277q.792-.001 1.533-.16a.79.79 0 0 1 .81.316.73.73 0 0 1-.031.893A8.35 8.35 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.75.75 0 0 1 6 .278" />
                                <path
                                    d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.73 1.73 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.73 1.73 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.73 1.73 0 0 0 1.097-1.097zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.16 1.16 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.16 1.16 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732z" />
                            </svg>

                        </button>
                        <!-- Profile Menu  -->
                        @auth
                            <div x-data="{ userDropdownIsOpen: false }" class="relative ms-auto"
                                x-on:keydown.esc.window="userDropdownIsOpen = false">
                                <button type="button"
                                    class="flex w-full cursor-pointer items-center rounded-md gap-2 p-2 text-left text-neutral-600 hover:bg-black/5 hover:text-neutral-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black dark:text-neutral-300 dark:hover:bg-white/5 dark:hover:text-white dark:focus-visible:outline-white"
                                    x-bind:class="userDropdownIsOpen ? 'bg-black/10 dark:bg-white/10' : ''"
                                    aria-haspopup="true" x-on:click="userDropdownIsOpen = ! userDropdownIsOpen"
                                    x-bind:aria-expanded="userDropdownIsOpen">
                                    {{-- <img src="https://penguinui.s3.amazonaws.com/component-assets/avatar-7.webp" class="size-8 object-cover rounded-md" alt="avatar" aria-hidden="true" /> --}}
                                    <div class="object-cover rounded-md" alt="avatar" aria-hidden="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="size-8" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                                          </svg>
                                    </div>
                                    <div class="hidden md:flex flex-col">
                                        <span class="text-sm font-bold text-neutral-900 dark:text-white">{{ Str::of(auth()->user()->name)->before(' ') }}</span>
                                        <span class="text-xs" aria-hidden="true">{{ Str::of(auth()->user()->email)->before('@') }}</span>
                                        <span class="sr-only">profile settings</span>
                                    </div>
                                </button>

                                <!-- menu -->
                                <div x-cloak x-show="userDropdownIsOpen"
                                    class="absolute top-14 ltr:right-0 rtl:left-0 z-20 h-fit w-48 border divide-y divide-neutral-300 border-neutral-300 bg-white dark:divide-neutral-700 dark:border-neutral-700 dark:bg-neutral-950 rounded-md"
                                    role="menu" x-on:click.outside="userDropdownIsOpen = false"
                                    x-on:keydown.down.prevent="$focus.wrap().next()"
                                    x-on:keydown.up.prevent="$focus.wrap().previous()" x-transition=""
                                    x-trap="userDropdownIsOpen">

                                    <div class="flex flex-col py-1.5">
                                        <a href="{{ route('profile.show') }}"
                                            class="flex items-center gap-2 px-2 py-1.5 text-sm font-medium text-neutral-600 underline-offset-2 hover:bg-black/5 hover:text-neutral-900 focus-visible:underline focus:outline-none dark:text-neutral-300 dark:hover:bg-white/5 dark:hover:text-white"
                                            role="menuitem">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" class="size-5 shrink-0" aria-hidden="true">
                                                <path
                                                    d="M10 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM3.465 14.493a1.23 1.23 0 0 0 .41 1.412A9.957 9.957 0 0 0 10 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 0 0-13.074.003Z" />
                                            </svg>
                                            <span>Profile</span>
                                        </a>
                                    </div>

                                    <div class="flex flex-col py-1.5">
                                        <a href="{{ route('dashboard') }}"
                                            class="flex items-center gap-2 px-2 py-1.5 text-sm font-medium text-neutral-600 underline-offset-2 hover:bg-black/5 hover:text-neutral-900 focus-visible:underline focus:outline-none dark:text-neutral-300 dark:hover:bg-white/5 dark:hover:text-white"
                                            role="menuitem">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-speedometer" viewBox="0 0 16 16">
                                                <path d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2M3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707M2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8m9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5m.754-4.246a.39.39 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.39.39 0 0 0-.029-.518z"/>
                                                <path fill-rule="evenodd" d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.95 11.95 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0"/>
                                              </svg>
                                            <span>Dashboard</span>
                                        </a>
                                        {{-- <a href="#"
                                            class="flex items-center gap-2 px-2 py-1.5 text-sm font-medium text-neutral-600 underline-offset-2 hover:bg-black/5 hover:text-neutral-900 focus-visible:underline focus:outline-none dark:text-neutral-300 dark:hover:bg-white/5 dark:hover:text-white"
                                            role="menuitem">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" class="size-5 shrink-0" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M2.5 4A1.5 1.5 0 0 0 1 5.5V6h18v-.5A1.5 1.5 0 0 0 17.5 4h-15ZM19 8.5H1v6A1.5 1.5 0 0 0 2.5 16h15a1.5 1.5 0 0 0 1.5-1.5v-6ZM3 13.25a.75.75 0 0 1 .75-.75h1.5a.75.75 0 0 1 0 1.5h-1.5a.75.75 0 0 1-.75-.75Zm4.75-.75a.75.75 0 0 0 0 1.5h3.5a.75.75 0 0 0 0-1.5h-3.5Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span>Payments</span>
                                        </a> --}}
                                    </div>

                                    <div class="flex flex-col py-1.5">
                                        <form action="{{ route('logout') }}" method="post" x-data>
                                            @csrf
                                            <a href="{{ route('logout') }}"
                                                class="flex items-center gap-2 px-2 py-1.5 text-sm font-medium text-neutral-600 underline-offset-2 hover:bg-black/5 hover:text-neutral-900 focus-visible:underline focus:outline-none dark:text-neutral-300 dark:hover:bg-white/5 dark:hover:text-white"
                                                role="menuitem" @click.prevent="$root.submit();">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" class="size-5 shrink-0" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M3 4.25A2.25 2.25 0 0 1 5.25 2h5.5A2.25 2.25 0 0 1 13 4.25v2a.75.75 0 0 1-1.5 0v-2a.75.75 0 0 0-.75-.75h-5.5a.75.75 0 0 0-.75.75v11.5c0 .414.336.75.75.75h5.5a.75.75 0 0 0 .75-.75v-2a.75.75 0 0 1 1.5 0v2A2.25 2.25 0 0 1 10.75 18h-5.5A2.25 2.25 0 0 1 3 15.75V4.25Z"
                                                        clip-rule="evenodd" />
                                                    <path fill-rule="evenodd"
                                                        d="M6 10a.75.75 0 0 1 .75-.75h9.546l-1.048-.943a.75.75 0 1 1 1.004-1.114l2.5 2.25a.75.75 0 0 1 0 1.114l-2.5 2.25a.75.75 0 1 1-1.004-1.114l1.048-.943H6.75A.75.75 0 0 1 6 10Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <span>Logout</span>
                                            </a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endauth

                        @guest
                            <div class="flex gap-4 py-2 ms-auto">
                                <a href="{{ route('register') }}">
                                    <x-button class="!bg-blue-500">Register</x-button>
                                </a>
                                <a href="{{ route('login') }}">
                                    <x-button class="!bg-green-500">Login</x-button>
                                </a>
                            </div>
                        @endguest
                    </div>
                </div>
            </nav>
            <!-- main content  -->
            <div id="main-content" class="p-4">
                <div class="overflow-y-auto">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>


    @livewireScripts
    <script>
        document.querySelector('#sidebar').addEventListener('scroll', () => {
            localStorage.setItem('sidebarScroll', document.querySelector('#sidebar').scrollTop);
        });

        document.addEventListener('DOMContentLoaded', () => {
            const storedScrollPosition = localStorage.getItem('sidebarScroll');
            if (storedScrollPosition !== null) {
                document.querySelector('#sidebar').scrollTop = Number(storedScrollPosition);
            }
        });

        // document.addEventListener("DOMContentLoaded", () => {
        //     const currentDirection = localStorage.getItem("direction") || "ltr";
        //     fetch("/sync-direction", {
        //             method: "POST",
        //             headers: {
        //                 "Content-Type": "application/json",
        //                 "X-CSRF-TOKEN": document.querySelector('meta[name=' + 'csrf-token' + ']').content,
        //             },
        //             body: JSON.stringify({
        //                 direction: currentDirection
        //             }),
        //     })
        //     .then((response) => response.json())
        //     .then((data) => console.log(data));
        // });


        // document.addEventListener("DOMContentLoaded", () => {
        //     const currentDirection = localStorage.getItem("direction") || "ltr";
        //     const sessionDirection = document.documentElement.getAttribute("dir");

        //     // If session direction differs from localStorage, sync and reload
        //     if (currentDirection !== sessionDirection) {
        //         const form = document.createElement("form");
        //         form.method = "POST";
        //         form.action = "/sync-direction";

        //         const directionInput = document.createElement("input");
        //         directionInput.type = "hidden";
        //         directionInput.name = "direction";
        //         directionInput.value = currentDirection;

        //         const csrfInput = document.createElement("input");
        //         csrfInput.type = "hidden";
        //         csrfInput.name = "_token";
        //         csrfInput.value = document.querySelector('meta[name="csrf-token"]').content;

        //         form.appendChild(directionInput);
        //         form.appendChild(csrfInput);
        //         document.body.appendChild(form);
        //         form.submit();
        //     }
        // });
    </script>
</body>

</html>
