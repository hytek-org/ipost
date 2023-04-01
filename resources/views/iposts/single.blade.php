@extends('layout')
@section('head')
    <style>
        /* Styles required only for the example above */
        .scrollspy-example {
            position: relative;
            height: 600px;
            overflow: auto;

        }

        #blogshow {
            overflow: auto;
        }

        #blogshow h1 {

            font-size: 42px;
            font-weight: bold;
        }

        #blogshow h2 {

            font-size: 32px;
            font-weight: bold;
        }

        #blogshow h3 {

            font-size: 22px;
            font-weight: 800;

        }

        #blogshow h4 {

            font-size: 20px;
            font-weight: 700;
        }

        #blogshow p {

            font-size: 18px;
        }


        .comment {
            border: 1px solid #ccc;
            margin-bottom: 10px;
            padding: 10px;
        }

        .comment-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 5px;
        }

        .comment-header h5 {
            margin: 0;
        }

        .comment-body {
            margin-bottom: 5px;
        }

        .comment-actions {
            margin-top: 5px;
        }

        .reply-link {
            text-decoration: none;
            color: #337ab7;
            font-weight: bold;
        }

        .comment-replies {
            margin-top: 10px;
            padding-left: 20px;
        }

        .reply-form {
            margin-top: 10px;
            padding-left: 20px;

        }

        .reply-form textarea {
            width: 100%;
            height: 100px;
            resize: vertical;
            margin-bottom: 5px;
        }

        .form {
            margin-top: 10px;
            padding-left: 20px;

        }

        .form textarea {
            width: 100%;
            height: 100px;
            resize: vertical;
            margin-bottom: 5px;
        }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />
    {{-- <script src="../path/to/flowbite/dist/flowbite.min.js"></script> --}}
@endsection
@section('main')
    <x-app-layout>
        <main>
            <section class="text-gray-600 pt-24 body-font">
                <div class="container mx-auto flex px-4 md:flex-row flex-col items-center">
                    <div
                        class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center ">
                        <div class="flex flex-row ">
                            <p class="dark:text-gray-200 text-xs "> {{ $post->created_at->diffForHumans() }}</p>
                            <p class="dark:text-gray-200 text-xs"> <span class="text-gray-500 ml-1 "> Written By</span>
                                {{ $post->user->name }}</p>
                        </div>

                        <h1 class="title-font sm:text-4xl mt-4 text-3xl mb-4 font-medium text-gray-900 dark:text-white">
                            {{ $post->title }}

                        </h1>
                        <p class="mb-4 leading-relaxed">{{ $post->short_desc }}</p>

                        <div class="flex justify-center  mt-5 mb-5">

                            <div class="flex items-center space-x-4 px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">
                                <form method="post" action="{{ route('posts.like', $post) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-primary btn-sm ">
                                        <span class=" text-black dark:text-white text-2xl"> <i class="far fa-thumbs-up"></i>
                                            {{ $post->likes_count }}</span>
                                    </button>
                                </form>

                                <form class="" method="post" action="{{ route('posts.dislike', $post) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger btn-sm ">
                                        <span class="text-black dark:text-white text-2xl"> <i
                                                class="far fa-thumbs-down"></i> {{ $post->dislikes_count }}</span>
                                    </button>
                                </form>



                                <button type="submit"
                                    class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                                    <span class=" text-2xl"> <i class="fa fa-share"></i></span>
                                    <span class="sr-only">Share</span>
                                </button>
                            </div>
                            </form>

                        </div>
                        <div class="flex justify-center">
                            <a href="#blogshow"
                                class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Read
                                More</a>
                        </div>
                    </div>
                    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                        <img class="object-cover object-center rounded" alt="hero"
                            src="/storage/posts/{{ $post->img_path }}">
                    </div>
                </div>
            </section>
            <section class=" text-black dark:text-white bg-gray-300 dark:bg-black mx-2 pr-5 sm:mx-40">

                <div>
                    <div class="sm:w-3/4  pl-4 pr-4 sm:ml-24 pt-5   sm:mr-24">
                        <section id="blogshow" class="text-clip ">

                            {!! $post->body !!}


                        </section>

                    </div>
                </div>
            </section>
            <section>
                <fieldset class="mt-4 sm:w-3/4  pl-4 pr-4  pt-5 mx-auto   ">
                    <legend class="text-2xl font-bold dark:text-white">Tags</legend>
                    <div class="flex flex-wrap ">
                        <!-- Active: "ring-2 ring-indigo-500" -->
                        @foreach ($tags as $tag)
                            <a href="#"
                                class="px-2 ml-1 py-1.5 text-xs font-semibold text-gray-800 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500 hover:text-indigo-500 dark:hover:text-blue-500">{{ $tag->name }}</a>
                        @endforeach


                    </div>
                </fieldset>
            </section>
            {{-- comments --}}

            <section class="bg-white dark:bg-gray-900 py-8 lg:py-16">
                <div class="max-w-2xl mx-auto px-4">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Discussions</h2>
                    </div>
                    <form action="{{ route('comments.store', $post->id) }}" method="post" class="mb-6">
                        @csrf
                        <div
                            class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                            <label for="comment" class="sr-only">Your comment</label>
                            <textarea name="body" id="comment" rows="6"
                                class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                                placeholder="Write a comment..." required></textarea>
                        </div>
                        <button type="submit"
                            class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                            Post comment
                        </button>
                    </form>
                    <article class="p-6 mb-6 text-base bg-white rounded-lg dark:bg-gray-900">
                        @foreach ($post->comments as $comment)
                            <footer class="flex justify-between items-center mb-2">
                                <div class="flex items-center">
                                    <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white"><img
                                            class="mr-2 w-6 h-6 rounded-full" src="/{{ $comment->user->img_path }}"
                                            alt="Michael Gough">{{ $comment->user->name }}</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        <time>{{ $comment->created_at->diffForHumans() }}</time>
                                    </p>
                                </div>
                                <button id="dropdownComment1Button{{ $comment->user->id }}"
                                    data-dropdown-toggle="dropdownComment1{{ $comment->user->id }}"
                                    class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                    type="button">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                        </path>
                                    </svg>
                                    <span class="sr-only">Comment settings</span>
                                </button>
                                <!-- Dropdown menu -->
                                <div id="dropdownComment1{{ $comment->user->id }}"
                                    class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="dropdownMenuIconHorizontalButton">
                                        <li>
                                            <a href="#"
                                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                                        </li>
                                    </ul>
                                </div>
                            </footer>
                            <p class="text-gray-500 dark:text-gray-400"> {{ $comment->body }}</p>
                            <div class="flex items-center mt-4 space-x-4">
                                <button type="button" data-modal-target="staticModal{{ $comment->user->id }}"
                                    data-modal-toggle="staticModal{{ $comment->user->id }}"
                                    class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400">
                                    <svg aria-hidden="true" class="mr-1 w-4 h-4" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                        </path>
                                    </svg>
                                    Reply
                                </button>
                            </div>
                            @foreach ($comment->children as $child)
                                <article class="p-6 mb-6 ml-6 lg:ml-12 text-base bg-white rounded-lg dark:bg-gray-900">

                                    <footer class="flex justify-between items-center mb-2">
                                        <div class="flex items-center">
                                            <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                                                <img class="mr-2 w-6 h-6 rounded-full"
                                                    src="/{{ $child->user->img_path }}"
                                                    alt="Jese Leos">{{ $child->user->name }}
                                            </p>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                                <time>{{ $child->created_at->diffForHumans() }}</time>
                                            </p>
                                        </div>
                                        <button id="dropdownComment2Button{{ $child->user->id }}"
                                            data-dropdown-toggle="dropdownComment2{{ $child->user->id }}"
                                            class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                            type="button">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                                </path>
                                            </svg>
                                            <span class="sr-only">Comment settings</span>
                                        </button>
                                        <!-- Dropdown menu -->
                                        <div id="dropdownComment2{{ $child->user->id }}"
                                            class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                                aria-labelledby="dropdownMenuIconHorizontalButton">
                                                <li>
                                                    <a href="#"
                                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </footer>
                                    <p class="text-gray-500 dark:text-gray-400"> {{ $child->body }}</p>
                                    {{-- <div class="flex items-center mt-4 space-x-4">
                                    <button type="button"
                                        class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400">
                                        <svg aria-hidden="true" class="mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                        Reply
                                    </button>
                                </div> --}}
                                </article>
                            @endforeach




                            <!-- Main modal -->
                            <div id="staticModal{{ $comment->user->id }}" data-modal-backdrop="static" tabindex="-1"
                                aria-hidden="true"
                                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                                <div class="relative w-full h-full max-w-2xl md:h-auto">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div
                                            class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                Post Reply
                                            </h3>
                                            <button type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="staticModal{{ $comment->user->id }}">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="p-6 space-y-6 ">
                                            <form action="{{ route('comments.store', $post->id) }}" method="post">
                                                @csrf
                                                <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                                <textarea name="body"
                                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Reply to {{ $comment->user->name }}"></textarea>


                                        </div>
                                        <!-- Modal footer -->
                                        <div
                                            class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                            <button data-modal-hide="staticModal{{ $comment->user->id }}" type="submit"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Publish</button>
                                            <button data-modal-hide="staticModal{{ $comment->user->id }}" type="button"
                                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </article>
                </div>
            </section>




            {{-- related posts --}}
            <div class="flex flex-wrap justify-evenly p-5 ">
                @foreach ($relatedPosts as $relatedPost)
                    <div class="p-4 md:w-1/4 ml-2 mt-4 sm:mb-0 mb-6 dark:bg-black bg-gray-300 rounded-lg ">

                        <div class="rounded-lg h-64 overflow-hidden">
                            <img alt="content" class=" object-center h-full w-full"
                                src="/storage/posts/{{ $relatedPost->img_path }}">
                        </div>
                        <div class="dark:text-gray-100 mt-5  ">
                            <p class="text-xs ">
                                {{ $post->created_at->diffForHumans() }}

                                <span class="text-xs text-gray-500 ">Written By </span>
                                <span class="text-xs ">{{ $relatedPost->user->name }}</span>


                            </p>
                        </div>
                        <h2 class="text-xl font-medium title-font text-gray-900 mt-5 dark:text-gray-100">
                            {{ $relatedPost->title }}
                        </h2>
                        <p class="text-base leading-relaxed mt-2 dark:text-gray-100">{{ $relatedPost->short_desc }}
                        </p>

                        <div class="flex flex-wrap justify-between">
                            <a href="{{ route('blog.show', $relatedPost->slug) }}"
                                class="text-indigo-500 inline-flex items-center mt-3">Read More
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                            <div>
                                <span class="text-xl mt-3 mr-3  cursor-pointer "><i class="far fa-heart"></i>
                                    {{ $relatedPost->likes_count }}</span>
                                <span class=" mt-3 text-xl cursor-pointer "><i class="fa fa-share"></i></span>

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>
            </section>
        </main>
    </x-app-layout>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
@endsection
