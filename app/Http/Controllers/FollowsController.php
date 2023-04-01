<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProfileMain;
use App\Models\User;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
{
    $users = User::all();

    return view('profile.userview', compact('users'));
}

    public function follow(User $user)
{
    auth()->user()->follows()->attach($user);

    return back();
}

public function unfollow(User $user)
{
    auth()->user()->follows()->detach($user);

    return back();
}
public function show()
{
    $users = User::take(100)->paginate(3);
   
    return view('profile.iposters', compact('users'));
}
}
