@extends('layout')

@section('main')
<x-app-layout>
  




    <section class="flex bg-gray-100 dark:bg-gray-700 min-h-screen pt-24">
     
        <div class="flex-grow text-gray-800 dark:text-white">
 
          <main class="p-6 sm:p-10 space-y-6">
            <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
              <div class="mr-6">
                <h1 class="text-4xl font-semibold mb-2">Dashboard</h1>
                <a href="{{route("user.index")}}" class="text-indigo-600 dark:text-blue-600 ml-0.5">Your Profile</a>
              </div>
              <div class="flex flex-wrap items-start justify-end -mb-3">
                <a href="{{route('categories.create')}}" class="inline-flex px-5 py-3 text-black dark:text-white dark:hover:text-gray-400 hover:text-purple-700 focus:text-purple-700   border border-purple-600 rounded-md mb-3">
                  <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="flex-shrink-0 h-5 w-5 -ml-1 mt-0.5 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                  </svg>
                  Create new Category
                </a>
                <a href="{{route('blog.create')}}" class="inline-flex px-5 py-3 text-white bg-purple-600 hover:bg-purple-700 focus:bg-purple-700 rounded-md ml-6 mb-3">
                  <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="flex-shrink-0 h-6 w-6 text-white -ml-1 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                  </svg>
                  Create new IPOST
                </a>
              </div>
            </div>
            <section  class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">
              <div class="flex items-center p-8 bg-white dark:bg-black shadow rounded-lg">
                <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-purple-600 bg-purple-100 rounded-full mr-6">
                  <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                  </svg>
                </div>
                <div>
                  <span class="block text-2xl font-bold">{{$followers}}</span>
                  <span class="block text-gray-500">Following</span>
                  <a class="text-indigo-500 dark:text-indigo-500" href="{{route('show')}}">view</a>

                </div>
              </div>
              <div class="flex items-center p-8 bg-white dark:bg-black  shadow rounded-lg">
                <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-green-600 bg-green-100 rounded-full mr-6">
                  <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                  </svg>
                </div>
                <div>
                  <span class="block text-2xl font-bold">6.8</span>
                  <span class="block text-gray-500">Growth</span>
                  <span class="block text-red-500">not operable</span>
                </div>
              </div>
              <div class="flex items-center p-8 bg-white  dark:bg-black  shadow rounded-lg">
                <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-red-600 bg-red-100 rounded-full mr-6">
                  <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6" />
                  </svg>
                </div>
                <div>
                  <span class="inline-block text-2xl font-bold">9</span>
                  <span class="inline-block text-xl text-gray-500 font-semibold">(14%)</span>
                  <span class="block text-gray-500">growth</span>
                  <span class="block text-red-500">not operable</span>
                </div>
              </div>
              <div class="flex items-center p-8 bg-white dark:bg-black  shadow rounded-lg">
                <div class="inline-flex flex-shrink-0 items-center justify-center h-16 w-16 text-blue-600 bg-blue-100 rounded-full mr-6">
                  <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                  </svg>
                </div>
                <div>
                  <span class="block text-2xl font-bold">83%</span>
                  <span class="block text-gray-500">Finished IPOST's</span>
                  <span class="block text-red-500">not operable</span>
                </div>
              </div>
            </section>
            <section id="manage" class="flex flex-col space-y-10 md:space-y-0 md:flex-row md:space-x-10  ">
             
            
              <div class=" bg-white dark:bg-black dark:text-white shadow rounded-lg w-full ">
                <div class="flex items-center justify-between px-6 py-5 font-semibold border-b border-gray-100">
                  <span>Your Ipost's</span>
                  <button type="button" class="inline-flex justify-center rounded-md px-1 -mr-1 bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-600" id="options-menu" aria-haspopup="true" aria-expanded="true">
                    Descending
                    <svg class="-mr-1 ml-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                  </button>
                
                  <!-- Refer here for full dropdown menu code: https://tailwindui.com/components/application-ui/elements/dropdowns -->
                </div>
                <div class="overflow-y-auto" style="max-height: 24rem;">
                  <ul class="p-6 space-y-6">
                    @foreach ($posts as $post)
                    @if (auth()->user()->id === $post->user->id)
                         <li class="flex items-center">
                      <a href="{{route('blog.show',$post)}}" class="h-10 w-10 mr-3 bg-gray-100 rounded-full overflow-hidden">
                        <img src="/storage/posts/{{$post->img_path}}" alt="Annette Watson profile picture">
                      </a>
                      
                      <a href="{{route('blog.show',$post)}}" class="text-gray-800 hover:text-gray-500 dark:text-gray-500 dark:hover:text-white">{{$post->title}}</a>
                      <a href="{{ route('blog.edit', $post) }}" class="ml-auto font-semibold"><i class="fas fa-edit"></i></a>
                     
                        <form action="{{ route('blog.destroy', $post) }}" method="post">
                            @csrf
                            @method('delete')
                           
                            <button type="submit" class="ml-4 cursor-pointer font-semibold text-red-500" >
                                <i class="fas fa-trash"></i>
                              </button>
                        </form>
                     
                    </li> 
                  
                    @endif
                  
                    @endforeach 
                  </ul>
                </div>
              </div>
              <div class=" bg-white dark:bg-black dark:text-white shadow rounded-lg w-full ">
                <div class="flex items-center justify-between px-6 py-5 font-semibold border-b border-gray-100">
                  <span>Your Ipost's categories</span>
                  <button type="button" class="inline-flex justify-center rounded-md px-1 -mr-1 bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-600" id="options-menu" aria-haspopup="true" aria-expanded="true">
                    Descending
                    <svg class="-mr-1 ml-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                  </button>
               
                  <!-- Refer here for full dropdown menu code: https://tailwindui.com/components/application-ui/elements/dropdowns -->
                </div>
                <div class="overflow-y-auto" style="max-height: 24rem;">
                  <ul class="p-6 space-y-6">
                    @foreach ($categories as $cat)
                    @auth
                        
                  
                    @if (auth()->user()->id === $cat->user->id)
                    <li class="flex items-center ">
                      <a href="{{ route('categories.index') }}" class="h-10 w-10 mr-3 bg-gray-100 rounded-full overflow-hidden">
                        <img src="https://randomuser.me/api/portraits/women/82.jpg" alt="Annette Watson profile picture">
                      </a>
                      
                      <a href="{{ route('categories.index') }}" class="text-gray-800 hover:text-gray-500 dark:text-gray-500 dark:hover:text-white">{{$cat->name}}</a>
                      
                      <a href="{{ route('categories.edit', $cat) }}" class="ml-auto font-semibold"><i class="fas fa-edit"></i></a>
                      
                      <form action="{{ route('categories.destroy', $cat) }}" method="post">
                        @csrf
                        @method('delete')
                       
                        <button type="submit" class="ml-4 cursor-pointer font-semibold text-red-500" >
                            <i class="fas fa-trash"></i>
                          </button>
                      
                     
                    </li>
                    @endif
                    @endauth
                    @endforeach
                  </ul>
                </div>
              </div>
             
            </section>
           
          </main>
        </div>
      
</section>



     
</x-app-layout>
@endsection