<?php

namespace App\Http\Controllers;

use App\Models\Post;

use App\Models\PostTag;

use App\Models\TemporaryFile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->search) {
            $posts = Post::where('title', 'like', '%' . $request->search . '%')
                ->orWhere('body', 'like', '%' . $request->search . '%')->latest()->paginate(6);
        } elseif ($request->category) {

            $posts = Category::where('name', $request->category)->firstOrFail()->posts()->paginate(3)->withQueryString();
        } else {
            $posts = Post::latest()->paginate(6);
        }

        $categories = Category::all()->take(5);
        return view('iposts.blog', compact('posts', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('iposts.create-blog-post', compact('categories'));
    }
    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required',
            'short_desc' => 'required',
            'image_ipost' => 'required ',
            'content' => 'required',
            'category_id' => 'required',
            'tags' => 'required'
        ]);
        $title = $request->input('title');
        if (Post::latest()->first() !== null) {
            $postId = Post::latest()->take(1)->first()->id + 1;
        } else {
            $postId = 1;
        }

        $slug = Str::slug($title, '-') . '-' . $postId;
        $user_id = Auth::user()->id;
        $body = $request->input('content');
        $short_desc = $request->input('short_desc');
        $cat_id = $request->input('category_id');
        // file upload
        $tmp_file = TemporaryFile::where('folder', $request->image_ipost)->first();

        if ($tmp_file) {
            Storage::disk('public')->copy('posts/tmp/' . $tmp_file->folder . '/' . $tmp_file->file, 'posts/' . $tmp_file->folder . '/' . $tmp_file->file);
            Post::create(
                [
                    'title' => $title,
                    'slug' => $slug,
                    'category_id' => $cat_id,
                    'user_id' => $user_id,
                    'img_path' => $tmp_file->folder . '/' . $tmp_file->file,
                    'body' => $body,
                    'short_desc' => $short_desc

                ]
            );

   // Parse the tags input and create new tags

   
   $tags = explode(',', $request->tags);
   $count = 0;
   foreach ($tags as $tagName) {
       $tag = Tag::firstOrCreate(['name' => trim($tagName)]);
    
      
        PostTag::Create(['post_id' => $postId,
        'tag_id' => $tag->id,]);
       
        if ($count == 9) {
            break;
        }
    $count++;
       }
     
   
 


            Storage::deleteDirectory('posts/tmp/' . $tmp_file->folder);
            $tmp_file->delete();
            Session::flash('message', 'Ipost created Successfully');
            return redirect()->back();
        }
        return redirect()->back();
    }


    public function tmpUpload(Request $request)
    {

        if ($request->hasFile('image_ipost')) {
            $image = $request->file('image_ipost');
            $file_name = $image->getClientOriginalName();
            $folder = uniqid('post', true);
            $image->storeAs('posts/tmp/' . $folder, $file_name);
            TemporaryFile::create([
                'folder' => $folder,
                'file' => $file_name
            ]);
            return $folder;
        }
        return '';
    }
    public function tmpDelete()
    {
        $tmp_file = TemporaryFile::where('folder', request()->getContent())->first();
        if ($tmp_file) {
            Storage::deleteDirectory('posts/tmp/' . $tmp_file->folder);
            $tmp_file->delete();
            return response('');
        }
    }

    public function show(Post $post)
    {
        $category = $post->category;
        
       
        
        $tags = $post->tags()->get();
        
       
      
        // return view('index', [
        //     'livewire' => app(InfiniteScroll::class, ['items' => $items]),
        // ]);




        $relatedPosts = $category->posts()->where('id', '!=', $post->id)->latest()->take(3)->get();
        return view('iposts.single', compact('post', 'relatedPosts','tags'));
    }

    public function edit(Post $post)
    {
        if (auth()->user()->id !== $post->user->id) {
            abort(403);
        }
        return view('iposts.single-edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        if (auth()->user()->id !== $post->user->id) {
            abort(403);
        }
        $request->validate([
            'title' => 'required',
            'short_desc' => 'required',
            'image_ipost' => 'required  ',
            'content' => 'required',

        ]);
        $title = $request->input('title');
        $postId = $post->id;

        $slug = Str::slug($title, '-') . '-' . $postId;

        $body = $request->input('content');
        $short_desc = $request->input('short_desc');

        // file upload
        $tmp_file = TemporaryFile::where('folder', $request->image_ipost)->first();

        if ($tmp_file) {
            Storage::disk('public')->copy('posts/tmp/' . $tmp_file->folder . '/' . $tmp_file->file, 'posts/' . $tmp_file->folder . '/' . $tmp_file->file);

            $post->title = $title;
            $post->slug = $slug;
            $post->short_desc = $short_desc;

            $post->body = $body;
            $post->img_path = $tmp_file->folder . '/' . $tmp_file->file;
            $post->save();


            Storage::deleteDirectory('posts/tmp/' . $tmp_file->folder);
            $tmp_file->delete();
            Session::flash('message', 'Ipost Edited Successfully');
            return redirect()->back();
        }
        return redirect()->back();

    }
    public function tmpUploadUp(Request $request)
    {

        if ($request->hasFile('image_ipost')) {
            $image = $request->file('image_ipost');
            $file_name = $image->getClientOriginalName();
            $folder = uniqid('post', true);
            $image->storeAs('posts/tmp/' . $folder, $file_name);
            TemporaryFile::create([
                'folder' => $folder,
                'file' => $file_name
            ]);
            return $folder;
        }
        return '';
    }
    public function tmpDeleteDl()
    {
        $tmp_file = TemporaryFile::where('folder', request()->getContent())->first();
        if ($tmp_file) {
            Storage::deleteDirectory('posts/tmp/' . $tmp_file->folder);
            $tmp_file->delete();
            return response('');
        }
    }
    public function destroy(Post $post)
    {
        if (auth()->user()->id !== $post->user->id) {
            abort(403);
        }
        $variable = $post->img_path;
        $variable = substr($variable, 0, strpos($variable, "/"));
        Storage::deleteDirectory('posts/' . $variable);
        $post->delete();

        Session::flash('message', 'Ipost Deleted Successfully');
        return redirect()->back();
    }

    public function dashindex()
    {
        $posts = Post::latest()->get();
        $categories = Category::latest()->get();
        $user = User::find(auth()->user()->id);
        $followers = $user->countFollowers();
        return view('dashboard', compact('posts', 'categories','followers'));
    }


    // post like and dislike in single blog page

    public function like(Post $post)
    {
        $user = auth()->user();
        if (!$user->hasLiked($post)) {
            $user->like($post);
        }

        return redirect()->back();
    }

    public function dislike(Post $post)
    {
        $user = auth()->user();
        if (!$user->hasDisliked($post)) {
            $user->dislike($post);
        }

        return redirect()->back();
    }
 

}