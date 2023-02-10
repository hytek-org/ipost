@extends('layout')
@section('main')
    <!-- main -->
    <x-app-layout>
    <h2 class="text-center text-3xl pt-24 dark:text-white">All IPOST Posts</h2>

    <form class="mt-5 flex flex-row justify-center" action="">
        <input class="rounded-l" type="search" placeholder="Search" name="search" id="">
        <input class="bg-blue-600 rounded-r text-white pl-2 pr-2" type="submit" value="Search">
    </form>


    <div class="flex flex-row ml-5 justify-center mt-5 ">
        <ul class="flex flex-row  flex-wrap justify-evenly  gap-y-6 gap-x-2  ">
            @foreach ($categories as $cat)
                {{-- {{route('blog.index',['category' => $cat->name])}} --}}
                <li><a
                        href="{{ route('blog.index', ['category' => $cat->name]) }}"class=" py-2.5 px-5  text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">{{ $cat->name }}</a>
                </li>
            @endforeach
            <li><a
                    href="{{ route('categories.index') }}"class=" text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">More</a>
            </li>



        </ul>
    </div>
    <div class="container  px-5 py-10 mx-auto">
        <div class="flex flex-col">
            <div class="h-1 bg-gray-200 rounded overflow-hidden">
                <div class="w-24 h-full bg-indigo-500"></div>
            </div>
            <div class="flex flex-wrap sm:flex-row flex-col py-6 mb-12">
                <h1 class="sm:w-2/5 text-gray-900 dark:text-white font-medium title-font text-2xl mb-2 sm:mb-0">Read Some
                    Popular IPOST</h1>
                <p class="sm:w-3/5 leading-relaxed text-base sm:pl-10 dark:text-gray-100 pl-0">Street art subway tile salvia
                    four dollar toast bitters selfies quinoa yuccie synth meditation iPhone intelligentsia prism tofu. Viral
                    gochujang bitters dreamcatcher.</p>
            </div>
        </div>
        <div class="flex flex-wrap justify-evenly  ">


            @forelse ($posts as $post)
                <div class="p-4 md:w-1/4 ml-2 mt-4 sm:mb-0 mb-6 dark:bg-black bg-gray-300 rounded-lg ">
                    <div class="rounded-lg h-64 overflow-hidden">
                        <img alt="content" class="object-cover object-center h-full w-full" src="/storage/posts/{{ $post->img_path }}">
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
                    <p class="text-base leading-relaxed mt-2 dark:text-gray-100">{{ $post->short_desc }}</p>
                    <a class="text-indigo-500 inline-flex items-center mt-3"
                        href="{{ route('blog.show', $post->slug) }}">Read More
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            @empty



                <div class="flex items-center flex-col justify-center lg:flex-row ">
                    <div class="w-full lg:w-1/2">
                        <img class="hidden lg:block" src="{{ asset('images/no-search-found.png') }}" />
                        <img class="hidden md:block lg:hidden" src="{{ asset('images/no-search-found.png') }}" />
                        <img class="md:hidden" src="{{ asset('images/no-search-found.png') }}" />
                    </div>
                    <div class="w-full lg:w-1/2">
                        <h1 class="py-4 text-3xl lg:text-4xl font-extrabold text-gray-800 dark:text-white">Oh No IPOST's
                            Found</h1>
                        <p class="py-4 text-base text-gray-800 dark:text-white">The content you’re looking for doesn’t
                            exist. Either it was removed, or you mistyped the link.</p>
                        <p class="py-2 text-base text-gray-800 dark:text-white">Sorry about that! Please search again.</p>
                        <button
                            class="w-full lg:w-auto my-4 rounded-md px-1 sm:px-16 py-5 bg-indigo-600 text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-700 focus:ring-opacity-50">Go
                            back to Search</button>
                    </div>
                </div>
            @endforelse


        </div>
    </div>











    <!-- pagination -->
    {{ $posts->links() }}
</x-app-layout>
@endsection
