@extends('layout')
@section('head')
    <title>
        hello create</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js"></script>

    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
    <style>
        #container {
            width: 1000px;
            margin: 20px auto;
        }

        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 200px;
        }

        .ck-content .image {
            /* block images */
            max-width: 80%;
            margin: 20px auto;
        }

        .ck-content h2 {
           
            font-size:32px;
            font-weight: bold;
        }
        .ck-content h3 {
          
            font-size:22px;
            font-weight: 800;
            
        }
        .ck-content h4 {
          
            font-size:20px;
            font-weight: 700;
        }
        .ck-content p {
            
            font-size:18px;
        }
    </style>

   
@endsection

@section('main')
    <!-- component -->
    <div class="py-12 pt-32">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @include('includes.flash-sucess-message')



                    <form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
                        {{-- csrf prevention --}}
                        @csrf

                        <div class="mb-4">
                            <label for="title" class="text-xl text-gray-600">Title <span
                                    class="text-red-500">*</span></label>
                            <input type="text" class="border-2 border-gray-300 p-2 w-full" name="title" id="title"
                                value="{{ old('title') }}" required>


                        </div>
                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Short Description <span
                                    class="text-red-500">*</span></label>
                            <textarea name="short_desc" class="border-2 w-full border-gray-500" required>
                            {{ old('short_desc') }}
                       </textarea>
                            @error('short_desc')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- dropdown for tags or category --}}
                        <label for="categories"><span>Choose a Category</span></label>
                        <select name="category_id" id="categories">
                            <option selected disabled>select option</option>

                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                            @error('category_id')
                                <p>{{ $message }}</p>
                            @enderror
                        </select>



                        <div class="mb-8">
                            <label class="text-xl text-gray-600">Content <span class="text-red-500">*</span></label>
                            <textarea id="editor" name="content" class="border-2  border-gray-500" required>
                                {{ old('content') }}
                           </textarea>
                            @error('content')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-8">
                            <label for="image_ipost" class="text-xl text-gray-600">Image <span
                                    class="text-red-500">*</span></label>
                            <input type="file" required name="image_ipost" class="filepond" id="image_ipost"
                                accept="image/*" data-max-file-size="3MB" data-max-files="1" />

                            @error('image_ipost')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="">

                            <p>Save and Publish</p>


                            <button role="submit"
                                class="inline-flex items-center w-full px-5 py-3 mb-3 mr-1 text-base font-semibold text-white no-underline align-middle bg-blue-600 border border-transparent border-solid rounded-md cursor-pointer select-none sm:mb-0 sm:w-auto hover:bg-blue-700 hover:border-blue-700 hover:text-white focus-within:bg-blue-700 focus-within:border-blue-700"
                                required>Submit
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>

                            </button>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>

    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);
        FilePond.registerPlugin(FilePondPluginFileValidateType);
        // Get a reference to the file input element
        const inputElement = document.querySelector('input[type="file"]');

        // Create a FilePond instance
        const pond = FilePond.create(inputElement);
        FilePond.create(document.querySelector('input[type="file"]'), {
            acceptedFileTypes: ['image/jpeg', 'image/png'],
            fileValidateTypeDetectType: (source, type) =>
                new Promise((resolve, reject) => {
                    // Do custom type detection here and return with promise

                    resolve(type);
                }),
        });

        FilePond.setOptions({
            server: {
                process: '/tmp-upload',

                revert: '/tmp-delete',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            },
        });
        FilePond.parse(document.body);
    </script>
@endsection
