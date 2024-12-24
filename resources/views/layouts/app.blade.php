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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? env('APP_NAME') }}</title>

    <script src="{{ asset('assets/js/lodash.min.js') }}"></script>
    <script src="{{ asset('assets/js/lodash.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts
    <script defer>
        document.onload = () => {
            document.querySelector('#sidebar').addEventListener('scroll', () => {
                localStorage.setItem('sidebarScroll', document.querySelector('#sidebar').scrollTop);
            });


            document.addEventListener('DOMContentLoaded', () => {
                const storedScrollPosition = localStorage.getItem('sidebarScroll');
                if (storedScrollPosition !== null) {
                    document.querySelector('#sidebar').scrollTop = Number(storedScrollPosition);
                }
            });
        }
    </script>
    <script type="text/javascript">
        var maxFilesizeVal = 12;
        var maxFilesVal = 2;

        // Note that the name "myDragAndDropUploader" is the camelized id of the form.
        Dropzone.options.uploader = {

            paramName: "file",
            maxFilesize: maxFilesizeVal, // MB
            maxFiles: maxFilesVal,
            resizeQuality: 1.0,
            acceptedFiles: ".jpeg,.jpg,.png,.webp",
            addRemoveLinks: false,
            timeout: 60000,
            dictDefaultMessage: "Drop your files here or click to upload",
            dictFallbackMessage: "Your browser doesn't support drag and drop file uploads.",
            dictFileTooBig: "File is too big. Max filesize: " + maxFilesizeVal + "MB.",

            dictInvalidFileType: "Invalid file type. Only JPG, JPEG, PNG and GIF files are allowed.",
            dictMaxFilesExceeded: "You can only upload up to " + maxFilesVal + " files.",
            maxfilesexceeded: function(file) {
                this.removeFile(file);
                // this.removeAllFiles();
            },
            sending: function(file, xhr, formData) {
                $('#message').text('Image Uploading...');
            },
            success: function(file, response) {
                $('#message').text(response.success);
                console.log(response.success);
                console.log(response);
            },
            error: function(file, response) {
                $('#message').text('Something Went Wrong! ' + response);
                console.log(response);
                return false;
            }
        };
    </script>
</body>

</html>
