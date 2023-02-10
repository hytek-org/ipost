<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    //
    public function index()
    {
        return view('contact');
    }


    public function send(Request $request)
    {


        $data = $request->validate([
            'name' => 'required',
          
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);

        Mail::send('emails.contact', $data, function ($message) use ($data) {
           
            
            $message->from($data['email'], $data['name']);
           
            $message->to('kuldeep@hytek.org.in');
            $message->subject($data['subject']);
            
        });

        return back()->with('success', 'Thank you for your message. We will be in touch soon.');
    }
}