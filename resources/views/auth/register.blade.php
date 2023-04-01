@extends('layout')
@section('head')
<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>

@endsection
@section('main')
<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 mb-2 w-full" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
  <!-- UName -->
  <div>
    <x-input-label for="uname" :value="__('User Name')" />
    <x-text-input id="uname" class="block mt-2 w-full" type="text" name="uname" :value="old('uname')" required autofocus />
    <x-input-error :messages="$errors->get('uname')" class="mt-2" />
</div>
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <div class="relative"> <input required autocomplete="current-password" type="password" name="password" id="password"  class="pass1 h-12 w-full mt-6 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded shadow-sm p-2" >  </div>  
        
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <div class="relative"> <input required autocomplete="current-password1" type="password" name="password_confirmation" id="password_confirmation"  class="pass1 h-12 w-full mt-6 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded shadow-sm p-2" ><i class="fa fa-eye eye_1 absolute top-10 right-3 cursor-pointer dark:text-white focus:text-black hover:text-black" id="togglePassword" ></i>  </div>  
      
           
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
@endsection
@section('script')

<script>
    window.addEventListener("DOMContentLoaded", function () {
      const togglePassword = document.querySelector("#togglePassword");
      const ptogglePassword1 = document.querySelector("#ptogglePassword1");
    
      togglePassword.addEventListener("click", function (e) {
        // toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);
        password_confirmation.setAttribute("type", type);
        // toggle the eye / eye slash icon
        this.classList.toggle("fa-eye-slash");
      });
      ptogglePassword1.addEventListener("click", function (e) {
        // toggle the type attribute
        const type =
          password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);
        // toggle the eye / eye slash icon
        this.classList.toggle("fa-eye-slash");
      });
    });
   
    
        </script>
@endsection