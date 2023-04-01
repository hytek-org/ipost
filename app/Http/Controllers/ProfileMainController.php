<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProfileMainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
*/




    public function __construct()
    {
        $this->middleware('auth')->except(['shareProfile']);
    }
    public function index(User $User)
    {

       
        $Users = User::where('id', Auth::user()->id)->first();
      $img = $Users->img_path;
      
        if ($img === null) {
            return view('profile.usercreate');
           
        } 
        return view('profile.userview', compact('Users'));
       
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('profile.usercreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'fname' => 'required',
            'contact_no' => 'required ',
            
            'gender' => 'required',
            'location' => 'required',
            'profession' => 'required',

            'fileUpload' => 'required|image',
            'fileUpload1' => 'required | image',
            'about' => 'required '
        ]);

        if ($request->hasFile('fileUpload') && $request->hasFile('fileUpload1')) {
            
            $image_1 = $request->file('fileUpload');

            $image_2 = $request->file('fileUpload1');



            $image_1_name = $image_1->getClientOriginalName();
            $image_1_name = Str::random(20) . '.' . $image_1_name;
            $image_2_name = $image_2->getClientOriginalName();
            $image_2_name = Str::random(20) . '.' . $image_2_name;
            $image_1->storeAs('public/images', $image_1_name);
            $image_2->storeAs('public/images', $image_2_name);


           
            $fname = $request->input('fname');
            $lname = $request->input('lname');
            $gender = $request->input('gender');
            $contact_no = $request->input('contact_no');
            $location = $request->input('location');
            $profession = $request->input('profession');
            $short_desc = $request->input('about');
            $facebook_link = $request->input('facebook_link');
            $insta_link = $request->input('insta_link');
            $twitter_link = $request->input('twitter_link');
            $youtube_link = $request->input('youtube_link');
            $linkdin_link = $request->input('linkdin_link');
            $github_link = $request->input('github_link');
            $web_link = $request->input('website_link');
            $img_path = 'storage/public/images/' . $image_1_name;
            $header_img_path = 'storage/public/images/' . $image_2_name;
            



            User::where('id', Auth::user()->id)->update([
                   
                    
                    'fname' => $fname,
                    'lname' => $lname,
                    'gender' => $gender,
                    'contact_no' => $contact_no,
                    'location' => $location,
                    'profession' => $profession,
                    'short_desc' => $short_desc,
                    'facebook_link' => $facebook_link,
                    'insta_link' => $insta_link,
                    'twitter_link' => $twitter_link,
                    'youtube_link' => $youtube_link,
                    'linkdin_link' => $linkdin_link,
                    'github_link' => $github_link,
                    'web_link' => $web_link,
                    'img_path' => $img_path,
                    'header_img_path' => $header_img_path,
                    
                ]
            );
            Session::flash('message', 'Profile created Successfully');
            return redirect()->back();
        }




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show(User $User)
    {
        //
        $Users = User::where('id', Auth::user()->id)->first();
   


        return view('profile.userview', compact('Users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $User)
    {
        //
        $User = User::where('id', Auth::user()->id)->first();
        return view('profile.useredit', compact('User'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $User)
    {
        
        
        
        $request->validate([
            'fname' => 'required',
            'contact_no' => 'required ',

            'gender' => 'required',
            'location' => 'required',
            'profession' => 'required',

            'fileUpload' => 'required|image',
            'fileUpload1' => 'required | image',
            'about' => 'required '
        ]);

        if ($request->hasFile('fileUpload') && $request->hasFile('fileUpload1')) {
            // dd($request);
            $id = Auth::user()->id;
            $image_1 = $request->file('fileUpload');

            $image_2 = $request->file('fileUpload1');



            $image_1_name = $image_1->getClientOriginalName();
            $image_1_name = Str::random(20) . '.' . $image_1_name;
            $image_2_name = $image_2->getClientOriginalName();
            $image_2_name = Str::random(20) . '.' . $image_2_name;
            $file1 = User::where('id', Auth::user()->id)->first();
            $file2 = User::where('id', Auth::user()->id)->first();
            
            Storage::delete('public/images/'.$file1->img_path);
            Storage::delete('public/images/'.$file2->header_img_path);
           
         
            $image_1->storeAs('public/images', $image_1_name);
            $image_2->storeAs('public/images', $image_2_name);


          
            $fname = $request->input('fname');
            $lname = $request->input('lname');
          
            $uname = $request->input('uname');
            $gender = $request->input('gender');
            $contact_no = $request->input('contact_no');
            $location = $request->input('location');
            $profession = $request->input('profession');
            $short_desc = $request->input('about');
            $facebook_link = $request->input('facebook_link');
            $insta_link = $request->input('insta_link');
            $twitter_link = $request->input('twitter_link');
            $youtube_link = $request->input('youtube_link');
            $linkdin_link = $request->input('linkdin_link');
            $github_link = $request->input('github_link');
            $web_link = $request->input('website_link');
            $img_path = 'storage/public/images/' . $image_1_name;
            $header_img_path = 'storage/public/images/' . $image_2_name;


            User::where('id', Auth::user()->id)->update([
                'uname' => $uname,
                'fname' => $fname,
                'lname' => $lname,
                'gender' => $gender,
                'contact_no' => $contact_no,
                'location' => $location,
                'profession' => $profession,
                'short_desc' => $short_desc,
                'facebook_link' => $facebook_link,
                'insta_link' => $insta_link,
                'twitter_link' => $twitter_link,
                'youtube_link' => $youtube_link,
                'linkdin_link' => $linkdin_link,
                'github_link' => $github_link,
                'web_link' => $web_link,
                'img_path' => $img_path,
                'header_img_path' => $header_img_path,
                'id' => $id
            ]);

       
           
            Session::flash('message', 'Profile Updated Successfully');
            return redirect()->back();


        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $User)
    {
        $file1 = User::where('id', Auth::user()->id)->first();
            $file2 = User::where('id', Auth::user()->id)->first();
            
            Storage::delete('public/images/'.$file1->img_path);
            Storage::delete('public/images/'.$file2->header_img_path);
           
        $User->delete();

        Session::flash('message', 'Profile details deleted Successfully');
        return redirect()->back();

       
     
    
        
    }


public function shareProfile(Request $request, User $User){
      
    $Users = User::where('uname',$request->uname )->first();
    return view('profile.userview', compact('Users'));




}


}