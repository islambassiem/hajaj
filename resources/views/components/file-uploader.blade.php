@section('styles')
    <style>
        .file-uploader .file-list {
            scrollbar-color: #999 transparent;
            scrollbar-width: thin;
        }

        .file-uploader .file-list:has(li) {
            padding: 20px;
        }


        .file-list .file-item:last-child {
            margin-bottom: 0px;
        }
        .file-uploader .file-upload-box.active .box-title {
            pointer-events: none;
        }
        .file-upload-box .box-title .file-browse-button:hover {
            text-decoration: underline;
        }
    </style>
@endsection

@props(['post_id'])


<div class="file-uploader w-10/12 m-auto mt-5 shadow-xl pb-4 bg-white dark:bg-gray-100">
    <div class="uploader-header flex justify-between items-center p-5 rounded-md bg-indigo-400/50 dark:text-neutral-300">
        <h2 class="uploader-title text-xl font-bold text-neutral-700 dark:text-neutral-600">{{ __('Image Uploader') }}</h2>
        <h4 class="file-completed-status text-base font-medium text-[#333]"></h4>
    </div>
    <ul class="file-list list-none w-full pb-3 max-h-[400px] overflow-y-auto scroll"></ul>
    <div class="file-upload-box bg-red-600 my-3 mx-5 rounded-md min-h-[100px] flex justify-center items-center border-2 border-dashed border-[#B1ADD4] transition-all duration-200 ease-in active:border-2 active:border-solid active:border-[#5145BA] bg-neutral-100/50 dark:bg-gray-800 ">
        <h2 class="box-title text-lg font-medium dark:text-neutral-300">
            <span class="file-instruction">{{ __('Drag files here or') }}</span>
            <span class="file-browse-button text-indigo-700 dark:text-indigo-300 cursor-pointer hover:underline">{{ __('browse') }}</span>
        </h2>
        <input class="file" type="file" multiple hidden accept=".jpeg, .png, .jpg, .gif, .svg" />
    </div>
    @section('scripts')
        <script>
            const fileList = document.querySelector(".file-list");
            const fileBrowseButton = document.querySelector(".file-browse-button");
            const fileBrowseInput = document.querySelector(".file");
            const fileUploadBox = document.querySelector(".file-upload-box");
            const fileCompletedStatus = document.querySelector(".file-completed-status");
            let totalFiles = 0;
            let completedFiles = 0;
            // Function to create HTML for each file item
            const createFileItemHTML = (file, uniqueIdentifier) => {
                // Extracting file name, size, and extension
                const {
                    name,
                    size
                } = file;
                const extension = name.split(".").pop();
                const formattedFileSize = size >= 1024 * 1024 ? `${(size / (1024 * 1024)).toFixed(2)} MB` :
                    `${(size / 1024).toFixed(2)} KB`;
                // Generating HTML for file item


                return `<li class="file-item flex gap-4 mb-5" id="file-item-${uniqueIdentifier}">
                <div class="file-extension h-12 w-12 text-white flex uppercase justify-center items-center rounded-2xl bg-[#5145BA]">${extension}</div>
                <div class="file-content-wrapper flex-1">
                <div class="file-content flex w-full justify-between">
                    <div class="file-details">
                    <h5 class="file-name text-base font-semibold">${name}</h5>
                    <div class="file-info flex gap-1">
                        <small class="file-size text-[#5c5c5c] mt-1 block text-sm font-medium">0 MB / ${formattedFileSize}</small>
                        <small class="file-divider text-[#5c5c5c] mt-1 block text-sm font-medium">•</small>
                        <small class="file-status text-[#5c5c5c] mt-1 block text-sm font-medium text-[#5145BA]">{{ __('Uploading...') }}</small>
                    </div>
                    </div>
                    <button class="cancel-button self-center border-none outline-none bg-transparent cursor-pointer text-2xl hover:text-[#E3413F]">
                        <i class="bx bx-x"></i>
                    </button>
                </div>
                <div class="file-progress-bar w-full h-1 mt-3 rounded-3xl bg-[#d9d9d9]">
                    <div class="file-progress w-0 bg-[#5145BA]" style="height: inherit; border-radius: inherit;"></div>
                </div>
                </div>
            </li>`;
            }

            // Function to handle file uploading
            const handleFileUploading = (file, uniqueIdentifier) => {
                const xhr = new XMLHttpRequest();
                const formData = new FormData();
                formData.append("file", file);
                formData.append("_token", "{{ csrf_token() }}");
                formData.append("post_id", "{{ $post_id }}");
                // Adding progress event listener to the ajax request
                xhr.upload.addEventListener("progress", (e) => {
                    // Updating progress bar and file size element
                    const fileProgress = document.querySelector(`#file-item-${uniqueIdentifier} .file-progress`);
                    const fileSize = document.querySelector(`#file-item-${uniqueIdentifier} .file-size`);
                    // Formatting the uploading or total file size into KB or MB accordingly
                    const formattedFileSize = file.size >= 1024 * 1024 ?
                        `${(e.loaded / (1024 * 1024)).toFixed(2)} MB / ${(e.total / (1024 * 1024)).toFixed(2)} MB` :
                        `${(e.loaded / 1024).toFixed(2)} KB / ${(e.total / 1024).toFixed(2)} KB`;
                    const progress = Math.round((e.loaded / e.total) * 100);
                    fileProgress.style.width = `${progress}%`;
                    fileSize.innerText = formattedFileSize;
                });
                // Opening connection to the server API endpoint "api.php" and sending the form data
                xhr.open("POST", "{{ route('image.upload') }}", true);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.send(formData);
                return xhr;
            }
            // Function to handle selected files
            const handleSelectedFiles = ([...files]) => {
                if (files.length === 0) return; // Check if no files are selected
                totalFiles += files.length;
                files.forEach((file, index) => {
                    const uniqueIdentifier = Date.now() + index;
                    const fileItemHTML = createFileItemHTML(file, uniqueIdentifier);
                    // Inserting each file item into file list
                    fileList.insertAdjacentHTML("afterbegin", fileItemHTML);
                    const currentFileItem = document.querySelector(`#file-item-${uniqueIdentifier}`);
                    const cancelFileUploadButton = currentFileItem.querySelector(".cancel-button");
                    const xhr = handleFileUploading(file, uniqueIdentifier);
                    // Update file status text and change color of it
                    const updateFileStatus = (status, color) => {
                        currentFileItem.querySelector(".file-status").innerText = status;
                        currentFileItem.querySelector(".file-status").style.color = color;
                    }
                    xhr.addEventListener("readystatechange", () => {
                        // Handling completion of file upload
                        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                            completedFiles++;
                            cancelFileUploadButton.remove();
                            updateFileStatus("{{ __('Done.') }}", "#00B125");
                            fileCompletedStatus.innerText =
                                `${completedFiles} / ${totalFiles} {{ __('files completed') }}`;
                        } else {
                            updateFileStatus("{{ __('Error') }}", "#E3413F");
                            // JSON.parse(xhr.responseText).error.file.join(" | ")
                        }
                    });
                    // Handling cancellation of file upload
                    cancelFileUploadButton.addEventListener("click", () => {
                        xhr.abort(); // Cancel file upload
                        updateFileStatus("{{ __('Cancelled') }}", "#E3413F");
                        cancelFileUploadButton.remove();
                    });
                    // Show Alert if there is any error occured during file uploading
                    xhr.addEventListener("error", () => {
                        updateFileStatus("{{ __('Error') }}", "#E3413F");
                        alert("{{ __('An error occurred during the file upload!') }}");
                    });
                });
                fileCompletedStatus.innerText = `${completedFiles} / ${totalFiles} {{ __('files completed') }}`;
            }
            // Function to handle file drop event
            fileUploadBox.addEventListener("drop", (e) => {
                e.preventDefault();
                handleSelectedFiles(e.dataTransfer.files);
                fileUploadBox.classList.remove("active");
                fileUploadBox.querySelector(".file-instruction").innerText = "{{ __('Drag files here or') }}";
            });
            // Function to handle file dragover event
            fileUploadBox.addEventListener("dragover", (e) => {
                e.preventDefault();
                fileUploadBox.classList.add("active");
                fileUploadBox.querySelector(".file-instruction").innerText = "";
            });
            // Function to handle file dragleave event
            fileUploadBox.addEventListener("dragleave", (e) => {
                e.preventDefault();
                fileUploadBox.classList.remove("active");
                fileUploadBox.querySelector(".file-instruction").innerText = "{{ __('Drag files here or') }}";
            });
            fileBrowseInput.addEventListener("change", (e) => handleSelectedFiles(e.target.files));
            fileBrowseButton.addEventListener("click", () => fileBrowseInput.click());

        </script>
    @endsection
</div>
