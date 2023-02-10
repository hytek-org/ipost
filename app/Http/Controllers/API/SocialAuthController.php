<?php


namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class SocialAuthController extends Controller
{
    //
    public function redirectToProvider()
    { 
        return Socialite::driver('google')->redirect();
    }
    public function handleCallback()
    { 
    
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }
    
        $existingUser = User::where('email', $user->getEmail())->first();
    
        if ($existingUser) {
            auth()->login($existingUser, true);
            return redirect()->to('/dashboard');
        }
    
        $newUser = new User([
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            
       
          
        ]);
    
        $newUser->save();
        auth()->login($newUser, true);
    
        return redirect()->to('/dashboard');
    

    }

    public function redirectToProviderGithub()
    { 
        return Socialite::driver('github')->redirect();
    }

    public function handleCallbackGithub(){

   
        try {
            $user = Socialite::driver('github')->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }
    
        $existingUser = User::where('email', $user->getEmail())->first();
    
        if ($existingUser) {
            auth()->login($existingUser, true);
            return redirect()->to('/dashboard');
        }
    
        $newUser = new User([
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            
            'github_id' => $user->id,
            'github_token' => $user->token,
            'github_refresh_token' => $user->refreshToken,
        ]);
    
        $newUser->save();
        auth()->login($newUser, true);
    
        return redirect()->to('/dashboard');
    }
}