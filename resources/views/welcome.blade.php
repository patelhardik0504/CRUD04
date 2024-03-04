@extends('layout.main')
@section('title', 'Home')
@section('content')
<p class="text-3xl font-bold text-center mt-6">Test Task For The Silver Touch Technologies Limited.</p>
<div class="flow-root mt-6">  
    <div class="float-left">
        <a href="/login"><button class="py-2 px-5 bg-violet-500 text-white font-semibold rounded-full shadow-md hover:bg-violet-700 focus:outline-none focus:ring focus:ring-violet-400 focus:ring-opacity-75">Login</button></a>
    </div>
    <div class="float-right">
        <a href="/register"><button class="py-2 px-5 bg-violet-500 text-white font-semibold rounded-full shadow-md hover:bg-violet-700 focus:outline-none focus:ring focus:ring-violet-400 focus:ring-opacity-75">Registration</button></a>
    </div>
    
</div>
@endsection