@extends('layout')
@section('main')
    <div>
        <p>Name: {{ $name }}</p>
       
        <p>Email: {{ $email }}</p>
        <p>Email: {{ $subject }}</p>
        <p>Message:</p>
        <p>{{ $message }}</p>
    </div>
@endsection
