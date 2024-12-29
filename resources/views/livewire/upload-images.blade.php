<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Upload the images') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <form action="{{ route('image.upload') }}" id="my-dropzone"
                class="dropzone border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg dark:text-neutral-200 bg-white dark:bg-gray-800">
                @csrf
                @method('POST')
                <input type="hidden" name="post_id" value="{{ session('post_id') }}">
                <div class="flex justify-center items-center" id="uploader">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="size-10 -mb-5 mt-7 text-indigo-500" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0m-.5 14.5V11h1v3.5a.5.5 0 0 1-1 0" />
                    </svg>
                </div>
            </form>
            <ul id="message" class="text-sm text-red-500 py-2"></ul>
        </div>
    </div>

    @section('scripts')
        <script>
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
