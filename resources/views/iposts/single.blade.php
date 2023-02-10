@extends('layout')
@section('head')
    <style>
        /* Styles required only for the example above */
        .scrollspy-example {
            position: relative;
            height: 600px;
            overflow: auto;

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
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />
    {{-- <script src="../path/to/flowbite/dist/flowbite.min.js"></script> --}}
@endsection
@section('main')
    <x-app-layout>
        <main>
            <section class="text-gray-600 pt-24 body-font">
                <div class="container mx-auto flex px-5 py-5 md:flex-row flex-col items-center">
                    <div
                        class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                        <div class="flex flex-row justify-end">
                            <p class="dark:text-gray-200 text-xs"> {{ $post->created_at->diffForHumans() }}</p>
                            <p class="dark:text-gray-200 text-xs"> <span class="text-gray-500 ml-1 "> Written By</span>
                                {{ $post->user->name }}</p>
                        </div>

                        <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900 dark:text-white">
                            {{ $post->title }}

                        </h1>
                        <p class="mb-8 leading-relaxed">{{ $post->short_desc }}</p>
                        <div class="flex justify-center">
                            <a href="#bodyMain"
                                class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Read
                                More</a>

                        </div>
                    </div>
                    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                        <img class="object-cover object-center rounded" alt="hero" src="{{ asset($post->img_path) }}">
                    </div>
                </div>
            </section>
            <section class=" text-black dark:text-white bg-gray-300 dark:bg-black mx-2 pr-5 sm:mx-40">

                <div data-bs-spy="scroll" data-bs-target="#scrollspy1" data-bs-offset="200" class="scrollspy-example  ">
                    <div
                        class="sm:w-3/4  pl-4 pr-4 sm:ml-24 pt-5   sm:mr-24">
                        <section id="blogshow">

                            {!! $post->body !!}
                            {!! $post->body !!}
                            {!! $post->body !!}
                            {!! $post->body !!}

                        </section>

                    </div>
                </div>
            </section>
            {{-- comments --}}
            <section class="ml-5  ">
                <div
                    class="text-black dark:text-white bg-gray-300 dark:bg-black mt-12 sm:mt-24  mr-5 sm:ml-24 sm:mr-24 sm:w-3/4 mx-auto  rounded-lg shadow">
                    <h3 class="font-bold text-xl ml-3 mb-4">Comments</h3>

                    @foreach ($comments as $comment)
                        @include('includes.comments', [
                            'comment' => $comment,
                            'comments' => $comments,
                        ])
                    @endforeach

                    <form class="m-5 pb-3" action="{{ route('comments.store', $post->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="parent_id" value="0">
                        <textarea name="body" class="w-full border border-gray-400 p-2 mb-2 rounded-lg" placeholder="Add a comment"></textarea>
                        <button class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-400">Add Comment</button>
                    </form>
                </div>

            </section>
            <section>
                <div class="flex flex-wrap justify-evenly p-5 ">
                    @foreach ($relatedPosts as $relatedPost)
                        <a href="{{ route('blog.show', $relatedPost->slug) }}"
                            class="p-4 md:w-1/4 ml-2 mt-4 sm:mb-0 mb-6 dark:bg-black bg-gray-300 rounded-lg ">

                            <div class="rounded-lg h-64 overflow-hidden">
                                <img alt="content" class="object-cover object-center h-full w-full"
                                    src="/storage/posts/{{ asset($relatedPost->img_path) }}">
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
                            <p class="text-base leading-relaxed mt-2 dark:text-gray-100">{!! $relatedPost->body !!}</p>
                            <button class="text-indigo-500 inline-flex items-center mt-3">Read More
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </button>
                        </a>
                    @endforeach

                </div>
            </section>
        </main>
    </x-app-layout>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
@endsection
