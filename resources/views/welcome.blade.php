@extends('layout')

@section('header')
    <div
        class="relative pt-20 isolate flex items-center gap-x-6 overflow-hidden bg-gray-50 py-2.5 px-6 sm:px-3.5 sm:before:flex-1">
        <svg viewBox="0 0 577 310" aria-hidden="true"
            class="absolute top-1/2 left-[max(-7rem,calc(50%-52rem))] -z-10 w-[36.0625rem] -translate-y-1/2 transform-gpu blur-2xl">
            <path id="1d77c128-3ec1-4660-a7f6-26c7006705ad" fill="url(#49a52b64-16c6-4eb9-931b-8e24bf34e053)" fill-opacity=".3"
                d="m142.787 168.697-75.331 62.132L.016 88.702l142.771 79.995 135.671-111.9c-16.495 64.083-23.088 173.257 82.496 97.291C492.935 59.13 494.936-54.366 549.339 30.385c43.523 67.8 24.892 159.548 10.136 196.946l-128.493-95.28-36.628 177.599-251.567-140.953Z" />
            <defs>
                <linearGradient id="49a52b64-16c6-4eb9-931b-8e24bf34e053" x1="614.778" x2="-42.453" y1="26.617"
                    y2="96.115" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#9089FC" />
                    <stop offset="1" stop-color="#FF80B5" />
                </linearGradient>
            </defs>
        </svg>
        <svg viewBox="0 0 577 310" aria-hidden="true"
            class="absolute top-1/2 left-[max(45rem,calc(50%+8rem))] -z-10 w-[36.0625rem] -translate-y-1/2 transform-gpu blur-2xl">
            <use href="#1d77c128-3ec1-4660-a7f6-26c7006705ad" />
        </svg>
        <div class="flex flex-wrap items-center gap-y-2 gap-x-4">
            <p class="text-sm leading-6 text-gray-900">
                <strong class="font-semibold">IPOST 2023</strong><svg viewBox="0 0 2 2"
                    class="mx-2 inline h-0.5 w-0.5 fill-current" aria-hidden="true">
                    <circle cx="1" cy="1" r="1" />
                </svg>This is a Alpha release and official launch is on.
            </p>
            <a href="https://hytek.org.in/ipost.html" target="_blank"
                class="flex-none rounded-full bg-gray-900 py-1 px-3.5 text-sm font-semibold text-white shadow-sm hover:bg-gray-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900">See
                now <span aria-hidden="true">&rarr;</span></a>
        </div>
        <div class="flex flex-1 justify-end">

        </div>
    </div>
@endsection

@section('main')
    <x-app-layout>
        <main>
            <section class="pt-4">
                <div
                    class="rounded-lg mx-4 sm:mx-20 bg-indigo-700   flex flex-col items-center pt-12 sm:pt-24 pb-12 sm:pb-22 md:pb-28 lg:pb-26 xl:pb-24">
                    <div class="w-full sm:w-2/3 mb-5 sm:mb-10">
                        <h1
                            class="text-xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl text-center text-white font-bold leading-tight">
                            The Freedom to Create the changes You Want</h1>
                        <p class="text-center">Alpha</p>
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


            <section class="ml-24 mt-5">
                <h2 class="text-xs text-blue-500 tracking-widest font-medium title-font mb-1">IPOST</h2>
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 dark:text-white">IPOST's latest Posts
                </h1>
            </section>

            <section>
                <div class="flex flex-wrap justify-evenly p-5 ">
                    @foreach ($posts as $post)
                    <div class="p-4 md:w-1/4 ml-2 mt-4 sm:mb-0 mb-6 dark:bg-black bg-gray-300 rounded-lg ">
                        <div class="rounded-lg h-64 overflow-hidden">
                            <img alt="content" class="object-cover object-center h-full w-full m-2" src="/storage/posts/{{ $post->img_path }}">
                        </div>
                        <div class="dark:text-gray-100 mt-5  ">
                            <p class="text-xs ">
                                {{ $post->created_at->diffForHumans() }}
    
                                <span class="text-xs text-gray-500 ">Written By </span>
                                <span class="text-xs ">{{ $post->user->name }}</span>
    
    
                            </p>
                        </div>
                        <h2 class="text-xl font-medium title-font text-gray-900 mt-5 dark:text-gray-100">{{ $post->title }}
                        </h2>
                        <p class="text-base leading-relaxed mt-2 dark:text-gray-100">{{ $post->short_desc }} ...</p>
                        
                        <div class="dark:text-gray-100 mt-5 flex justify-between ">
                            <p>
                                <a class="text-indigo-500 inline-flex items-center "
                                href="{{ route('blog.show', $post->slug) }}">Read More
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
    
                            </p>
                            <p>
                                <span class="text-xl  mr-3 cursor-pointer "><i class="far fa-heart"></i> {{ $post->likes_count }}</span>
                                <span class="mr-3 text-xl cursor-pointer "><i class="fa fa-share"></i></span>
                            </p>
                        </div>
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
                    <div class="p-4 md:w-1/4 ml-2 mt-4 sm:mb-0 mb-6 dark:bg-black bg-gray-300 rounded-lg ">
                        <div class="rounded-lg h-64 overflow-hidden">
                            <img alt="content" class="object-cover object-center h-full w-full m-2" src="/storage/posts/{{ $post->img_path }}">
                        </div>
                        <div class="dark:text-gray-100 mt-5  ">
                            <p class="text-xs ">
                                {{ $post->created_at->diffForHumans() }}
    
                                <span class="text-xs text-gray-500 ">Written By </span>
                                <span class="text-xs ">{{ $post->user->name }}</span>
    
    
                            </p>
                        </div>
                        <h2 class="text-xl font-medium title-font text-gray-900 mt-5 dark:text-gray-100">{{ $post->title }}
                        </h2>
                        <p class="text-base leading-relaxed mt-2 dark:text-gray-100">{{ $post->short_desc }} ...</p>
                        
                        <div class="dark:text-gray-100 mt-5 flex justify-between ">
                            <p>
                                <a class="text-indigo-500 inline-flex items-center "
                                href="{{ route('blog.show', $post->slug) }}">Read More
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
    
                            </p>
                            <p>
                                <span class="text-xl  mr-3 cursor-pointer "><i class="far fa-heart"></i> {{ $post->likes_count }}</span>
                                <span class="mr-3 text-xl cursor-pointer "><i class="fa fa-share"></i></span>
                            </p>
                        </div>
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
