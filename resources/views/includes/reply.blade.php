<div  class="mb-6 ml-5">
    <div class="flex items-start">
        <img src="/{{$comment->img_path}}" alt="Avatar" class="w-12 h-12 rounded-full mr-4">
        <div class="flex-1">
            <h4 class="font-bold mb-2 ">{{ $comment->user->name }}</h4>
            
            
            <p class="text-sm text-gray-600 mb-2 inline">{{ $comment->created_at->diffForHumans() }}</p>
            <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="inline" type="button">
                <i class="fa fa-reply" aria-hidden="true"></i>
              </button>
            <p class="text-gray-700">{{ $comment->body }}</p>
        </div>
    </div>
  
    <div id="popup-modal" tabindex="-1" class="fixed top-36 left-0 right-0 ml-5 mr-5 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
        <div class="relative w-full h-full max-w-md md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-0 right-0 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                  <form  action="{{ route('comments.store', $post->id) }}" method="post">
                      @csrf
                      <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                      <textarea name="body" class="w-full border border-gray-400 p-2 mb-2  rounded-lg" placeholder="Add a reply"></textarea>
                      
                
                  
                  <button data-modal-hide="popup-modal" type="submit" class="text-white bg-green-500 hover:bg-green-400 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Add Reply
                    </button>
                  
                </div>
              </form>
            </div>
        </div>
    </div>
    </div>