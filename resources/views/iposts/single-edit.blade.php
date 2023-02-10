@extends('layout')
@section('head')
    <title>hello Edit</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js"></script>
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link
   href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
   rel="stylesheet"
/>
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


                    <form method="POST" action="{{ route('blog.update',$post) }}" enctype="multipart/form-data">
                        @method('put')
                            {{-- csrf prevention --}}
                            @csrf

                            <div class="mb-4">
                                <label for="title" class="text-xl text-gray-600">Title <span class="text-red-500">*</span></label>
                                <input type="text" class="border-2 border-gray-300 p-2 w-full" name="title" id="title"
                                    value="{{old('title')}}" required>
                                
                         
                            </div>
                            <div class="mb-4">
                            <label class="text-xl text-gray-600">Short Description <span class="text-red-500">*</span></label>
                            <textarea  name="short_desc" class="border-2 w-full border-gray-500" required>
                                {{old('short_desc')}}
                           </textarea>
                           @error('short_desc')
                           <p>{{$message}}</p>
                       @enderror</div>

                        <div class="mb-8">
                            <label class="text-xl text-gray-600">Content <span class="text-red-500">*</span></label>
                            <textarea id="editor" name="content" class="border-2 border-gray-500" required>
                                {{$post->body}}
                           </textarea>
                           @error('content')
                           <p>{{$message}}</p>
                       @enderror
                        </div>
                        <div class="mb-8">
                            <label for="image_ipost" class="text-xl text-gray-600">Image <span
                                    class="text-red-500">*</span></label>
                                    <input type="file" required name="image_ipost" class="filepond" id="image_ipost" accept="image/*"
                                    data-max-file-size="3MB" data-max-files="1" />

                            @error('image_ipost')
                            <p>{{$message}}</p>
                        @enderror
                        </div>

                        <div class="">

                            <p>Save and Publish</p>


                            <button role="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400"
                                required>Submit</button>
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
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
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
                process: '/tmp-upload-update',
              
                revert: '/tmp-delete-update',
                headers: {
                    'X-CSRF-TOKEN':'{{ csrf_token()}}'
                }
            },
        });
        FilePond.parse(document.body);
        
            </script>
@endsection
