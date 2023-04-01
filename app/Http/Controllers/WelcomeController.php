<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Post;
class WelcomeController extends Controller
{
    //creating index method
    public function index()
    {
        $posts = Post::latest()->take(6)->get();

        return view('welcome',compact('posts'));
    }
  
    public function logout()
    {
        Session::flush();

        Auth::logout();

        $posts = Post::latest()->take(6)->get();

        return view('welcome',compact('posts'));
    }
}
       
        
      
      
        
       