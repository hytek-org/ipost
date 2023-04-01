@extends('layout')
@section('head')
    <title>User Create</title>
@endsection
@section('main')
    <div class="pt-24 p-5 ml-10 mr-10">

        <div class="mt-10 ml-10  sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-white">Personal Information</h3>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-200">Use a permanent address where you can receive mail.</p>
                    </div>
                </div>
                <div class="mt-5 md:col-span-2 md:mt-0 mr-10">
                    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('includes.flash-info-message')
                        @include('includes.flash-sucess-message')
                        <div class="overflow-hidden shadow sm:rounded-md">
                            <div class="bg-white px-4 py-5 sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="first-name" class="block text-sm font-medium text-gray-700">First
                                            name</label>
                                        <input required type="text" name="fname" value="{{ old('fname') }}"
                                            id="first-name"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        @error('fname')
                                            <p>{{ $message }}</p>
                                        @enderror
                                    </div>

                                  
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="last-name" class="block text-sm font-medium text-gray-700">Last
                                            name</label>
                                        <input  type="text" name="lname" id="last-name" value="{{ old('lname') }}"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        @error('lname')
                                            <p>{{ $message }}</p>
                                        @enderror
                                    </div>


                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                                        <select id="gender" name="gender"
                                            class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                        @error('gender')
                                            <p>{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="gender"
                                            class="block text-sm font-medium text-gray-700">Location</label>
                                        <select id="gender" name="location"
                                            class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                            <option value="India">India</option>
                                            <option value="Other">Other</option>

                                        </select>
                                    </div>
                                    <div class="col-span-6">
                                        <label for="profession"
                                            class="block text-sm font-medium text-gray-700">Profession</label>
                                        <input required type="text" name="profession" id="profession"
                                            value="{{ old('profession') }}"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        @error('profession')
                                            <p>{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-span-6">
                                        <label for="contact_no"
                                            class="block text-sm font-medium text-gray-700">Contact Number</label>
                                        <input required   type="tel" name="contact_no" id="contact_no"
                                            value="{{ old('contact_no') }}"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        @error('contact_no')
                                            <p>{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-span-6">
                                        <label for="about" class="block text-sm font-medium text-gray-700">About</label>
                                        <div class="mt-1">
                                            <textarea id="about" name="about" rows="3"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                               maxlength="150" placeholder="Hi , I am a ">{{ old('about') }}</textarea>
                                            @error('about')
                                                <p>{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are
                                            hyperlinked.</p>
                                    </div>
                                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                        <label for="facebook_link"
                                            class="block text-sm font-medium text-gray-700">Facebook</label>
                                        <input type="text" name="facebook_link" value="{{ old('facebook_link') }}"
                                            id="facebook_link" placeholder="https://www.facebook.com/hytek21"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        @error('facebook_link')
                                            <p>{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                        <label for="twitter_link"
                                            class="block text-sm font-medium text-gray-700">Twitter</label>
                                        <input type="text" name="twitter_link" value="{{ old('twitter_link') }}"
                                            id="twitter_link" placeholder="https://twitter.com/HYTEK21"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        @error('twitter_link')
                                            <p>{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                        <label for="linkedin_link"
                                            class="block text-sm font-medium text-gray-700">Linkdin</label>
                                        <input type="text" name="linkdin_link" id="linkedin_link"
                                            value="{{ old('linkdin_link') }}" placeholder="https://www.linkedin.com"
                                            autocomplete="postal-code"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        @error('linkedin_link')
                                            <p>{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                        <label for="instagram_link"
                                            class="block text-sm font-medium text-gray-700">Instagram</label>
                                        <input type="text" name="instagram_link" id="instagram_link"
                                            value="{{ old('instagram_link') }}"
                                            placeholder="https://www.instagram.com/hytek21/"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        @error('instagram_link')
                                            <p>{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                        <label for="youtube_link"
                                            class="block text-sm font-medium text-gray-700">Youtube</label>
                                        <input type="text" name="youtube_link" id="youtube_link"
                                            value="{{ old('youtube_link') }}" placeholder="https://www.youtube.com/"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        @error('youtube_link')
                                            <p>{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                        <label for="github_link"
                                            class="block text-sm font-medium text-gray-700">Github</label>
                                        <input type="text" name="github_link"
                                            id="github_link"value="{{ old('github_link') }}"
                                            placeholder="https://github.com/hytek-org"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        @error('github_link')
                                            <p>{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                        <label for="website_link"
                                            class="block text-sm font-medium text-gray-700">Website</label>
                                        <input type="text" name="website_link"
                                            id="website_link"value="{{ old('website_link') }}"
                                            placeholder="https://hytek.org.in"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        @error('website_link')
                                            <p>{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-span-6">
                                        <label class="block text-sm font-medium text-gray-700">Photo</label>
                                        <div class="mt-1 flex items-center">
                                            <span class="inline-block h-12 w-12 overflow-hidden rounded-full bg-gray-100">
                                                <svg class="h-full w-full text-gray-300" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                                </svg>
                                            </span>
                                            <label for="file-upload1"
                                                class="relative ml-5 cursor-pointer rounded-md border border-gray-300 bg-white py-2 px-3 text-sm font-medium leading-4 text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                                <span>Upload</span>
                                                <input id="file-upload1" name="fileUpload" type="file"
                                                    class="sr-only">
                                        </div>
                                    </div>

                                    <div class="col-span-6">
                                        <label class="block text-sm font-medium text-gray-700">Cover photo</label>
                                        <div
                                            class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                            <div class="space-y-1 text-center">
                                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor"
                                                    fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                    <path
                                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                                <div class="flex text-sm text-gray-600">
                                                    <label for="file-upload"
                                                        class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                                                        <span>Upload a file</span>
                                                        <input id="file-upload" name="fileUpload1" type="file"
                                                            class="sr-only">
                                                    </label>

                                                </div>
                                                <p class="text-xs text-gray-500">PNG, JPG up to 5MB</p>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                <button type="submit"
                                    class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
