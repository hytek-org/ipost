@extends('layout')
@section('head')
    <title>Category Edit</title>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
@endsection

@section('main')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">

                @include('includes.flash-sucess-message')

                <form method="POST" action="{{ route('categories.update',$category) }}" >
                    {{-- csrf prevention --}}
                    @csrf
                    @method('put')
                    <div class="mb-4">
                        <label class="text-xl text-gray-600">Category Title <span class="text-red-500">*</span></label>
                        <input type="text" class="border-2 border-gray-300 p-2 w-full" name="name" id="title"
                            value="{{$category->name}}"  maxlength="60" required>
                            @error('name')
                                <p>{{$message}}</p>
                            @enderror
                    </div>

                  

                    <div class="mb-8">
                        <label class="text-xl text-gray-600">Category Content <span class="text-red-500">*</span></label>
                        <textarea  name="content" class="border-2 border-gray-500" maxlength="160" required>
                            {{$category->cat_desc}}
                       </textarea>
                       @error('content')
                       <p>{{$message}}</p>
                   @enderror
                    </div>
                 

                    <div class="">

                        <p>Save and Publish</p>


                        <button role="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400"
                            required>Submit</button>
                    </div>
                </form>

<div class="container">
    <a href="{{route('categories.index')}}">Categories List</a>
</div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection