@extends('layout')



@section('main')
    <x-app-layout>
        <main>
            <section class="pt-24">
                <div
                    class="rounded-lg mx-4 sm:mx-20 bg-indigo-700   flex flex-col items-center pt-12 sm:pt-24 pb-12 sm:pb-22 md:pb-28 lg:pb-26 xl:pb-24">
                    <div class="w-full sm:w-2/3 mb-5 sm:mb-10">
                        <h1
                            class="text-xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl text-center text-white font-bold leading-tight">
                            The Freedom to Create the changes You Want</h1>
                    </div>


                    <div class="flex justify-center items-center ">
                        <button
                            class="hover:text-white hover:bg-transparent lg:text-xl hover:border-white border bg-white transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 ring-offset-indigo-700	focus:ring-white rounded text-indigo-700 px-4 sm:px-8 py-1 sm:py-3 text-sm">Get
                            Started</button>
                        <button
                            class="hover:bg-white hover:text-indigo-600 lg:text-xl hover:border-indigo-600 ml-3 sm:ml-6 bg-transparent transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 ring-offset-indigo-700 focus:ring-white hover:bg-indigo-700-800 rounded border border-white text-white px-4 sm:px-8 py-1 sm:py-3 text-sm">Learn
                            More</button>
                    </div>
                </div>
            </section>
            {{--     
    <div class=" pt-24   sm:pl-24 sm:pr-24 ">
        <div class="  rounded-lg bg-indigo-700  mx-auto flex flex-col items-center pt-12 sm:pt-24 pb-12 sm:pb-22 md:pb-28 lg:pb-26 xl:pb-24">
           
            <div class="w-1/4 sm:w-2/3 mb-5 sm:mb-10">
                <h1 class="text-xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl text-center text-white font-bold leading-tight">The Freedom to Create the changes You Want</h1>
            </div>
            <div class="flex justify-center items-center mb-10 sm:mb-20">
                <button class="hover:text-white hover:bg-transparent lg:text-xl hover:border-white border bg-white transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 ring-offset-indigo-700	focus:ring-white rounded text-indigo-700 px-4 sm:px-8 py-1 sm:py-3 text-sm">Get Started</button>
                <button class="hover:bg-white hover:text-indigo-600 lg:text-xl hover:border-indigo-600 ml-3 sm:ml-6 bg-transparent transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 ring-offset-indigo-700 focus:ring-white hover:bg-indigo-700-800 rounded border border-white text-white px-4 sm:px-8 py-1 sm:py-3 text-sm">Learn More</button>
            </div>
        </div>
      
    </div> --}}
            <section class="ml-24 mt-5">
                <h2 class="text-xs text-blue-500 tracking-widest font-medium title-font mb-1">IPOST</h2>
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 dark:text-white">IPOST's latest Posts
                </h1>
            </section>

            <section>
                <div class="flex flex-wrap justify-evenly p-5 ">
                    @foreach ($posts as $post)
                        <div class="p-4 md:w-1/3 ml-2 mt-4 sm:mb-0 mb-6 dark:bg-black bg-gray-300 rounded-lg ">
                            <div class="rounded-lg h-64 overflow-hidden">
                                <img alt="content" class="object-cover object-center h-full w-full"
                                    src="/storage/posts/{{ $post->img_path }}">
                            </div>
                            <div class="dark:text-gray-100 mt-5  ">
                                <p class="text-xs ">
                                    {{ $post->created_at->diffForHumans() }}

                                    <span class="text-xs text-gray-500 ">Written By </span>
                                    <span class="text-xs ">{{ $post->user->name }}</span>


                                </p>
                            </div>
                            <h2 class="text-xl font-medium title-font text-gray-900 mt-5 dark:text-gray-100">
                                {{ $post->title }}
                            </h2>
                            <p class="text-base leading-relaxed mt-2 dark:text-gray-100">{{ $post->short_desc }}</p>
                            <a class="text-indigo-500 inline-flex items-center mt-3"
                                href="{{ route('blog.show', $post->slug) }}">Read More
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    @endforeach

                </div>
                <div class="mb-10">
                    <a href="{{ route('blog.index') }}"
                        class="w-25 float-right mr-24 dark:hover:bg-gray-800 dark:bg-white dark:hover:text-gray-50 dark:text-gray-800 bg-gray-800 text-base md:text-xl font-semibold leading-tight text-white flex justify-between items-center px-2 py-2   focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 hover:bg-gray-700 ">View
                        All
                        <div>
                            <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/hero-II-svg1.svg"
                                alt="arrow">
                            <img class="dark:block hidden"
                                src="https://tuk-cdn.s3.amazonaws.com/can-uploader/hero-II-svg1dark.svg" alt="arrow">
                        </div>

                    </a>
                </div>

            </section>
            <section class="ml-24 mt-5">
                <h2 class="text-xs text-blue-500 tracking-widest font-medium title-font mb-1">IPOST</h2>
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 dark:text-white">IPOST's Popular Posts
                </h1>
            </section>
            <section>
                <div class="flex flex-wrap justify-evenly p-5 ">
                    @foreach ($posts as $post)
                        <div class="p-4 md:w-1/3 ml-2 mt-4 sm:mb-0 mb-6 dark:bg-black bg-gray-300 rounded-lg ">
                            <div class="rounded-lg h-64 overflow-hidden">
                                <img alt="content" class="object-cover object-center h-full w-full"
                                    src="/storage/posts/{{ $post->img_path }}">
                            </div>
                            <div class="dark:text-gray-100 mt-5  ">
                                <p class="text-xs ">
                                    {{ $post->created_at->diffForHumans() }}

                                    <span class="text-xs text-gray-500 ">Written By </span>
                                    <span class="text-xs ">{{ $post->user->name }}</span>


                                </p>
                            </div>
                            <h2 class="text-xl font-medium title-font text-gray-900 mt-5 dark:text-gray-100">
                                {{ $post->title }}
                            </h2>
                            <p class="text-base leading-relaxed mt-2 dark:text-gray-100">{{ $post->short_desc }}</p>
                            <a class="text-indigo-500 inline-flex items-center mt-3"
                                href="{{ route('blog.show', $post->slug) }}">Read More
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    @endforeach

                </div>
                <div class="mb-20">
                    <a href="{{ route('blog.index') }}"
                        class="w-25 float-right mr-24 dark:hover:bg-gray-800 dark:bg-white dark:hover:text-gray-50 dark:text-gray-800 bg-gray-800 text-base md:text-xl font-semibold leading-tight text-white flex justify-between items-center px-2 py-2   focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 hover:bg-gray-700 ">View
                        All
                        <div>
                            <img class="dark:hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/hero-II-svg1.svg"
                                alt="arrow">
                            <img class="dark:block hidden"
                                src="https://tuk-cdn.s3.amazonaws.com/can-uploader/hero-II-svg1dark.svg" alt="arrow">
                        </div>

                    </a>
                </div>
            </section>

        </main>
    </x-app-layout>
@endsection
