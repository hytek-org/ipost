@extends('layout')
@section('head')
    <title>Category list</title>
@endsection

@section('main')
    <div class="py-12 pt-24 sm:mx-20 mx-4">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden pb-5 pl-2 shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-center text-xl sm:text-3xl font-bold ">List Of All Categories</h1>
                    <ul>
                        @foreach ($categories as $category)
                            <li class="mb-5">
                                <p class="text-xs">Date {{$category->created_at->diffForHumans() }}</p>
                                <h1 class="text-xl font-bold">{{ $category->name }}</h1>
                                {!! $category->cat_desc !!}
                                <p class="text-xs">Created by <span class="text-blue-600">{{$category->user->name}}</span></p>
                            </li>
                            @auth
                                @if (auth()->user()->id === $category->user->id)
                                <li class="flex flex-row  ">
                                    <a class="px-2 py-2 text-white bg-blue-400  rounded cursor-pointer"
                                        href="{{ route('categories.edit', $category) }}">Edit</a>
                                    <form action="{{ route('categories.destroy', $category) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <input style="cursor: pointer;" class="px-2 py-2 ml-5 text-white bg-red-500 rounded"
                                            type="submit" value="Delete">
                                    </form>
                                </li> 
                                @endif
                            @endauth
                        

                            @include('includes.flash-sucess-message')
                        @endforeach
                    </ul>
                    <!-- pagination -->
                    {{ $categories->links() }}
                </div>
                <a class="text-indigo-500 cursor-pointer ml-3 " href="{{ route('categories.create') }}">Create a Category</a>
            </div>
        </div>
    </div>
    </div>
@endsection
