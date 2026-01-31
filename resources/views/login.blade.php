@extends('layouts.login')

@section('content')
<div class="bg-black/30 p-10 rounded-xl w-full max-w-md shadow-2xl border border-white/20">
    <h2 class="text-3xl font-bold text-center mb-2 text-white drop-shadow-lg">
        SIPPAUD
    </h2>
    <p class="text-center text-gray-200 mb-6 drop-shadow">
        Sistem Informasi Pembelajaran Pendidikan Usia Dini
    </p>

    @if(session('error'))
        <div class="bg-red-500/80 text-white p-3 mb-4 rounded shadow">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="/login" class="space-y-4">
        @csrf

        <input type="text" name="username" placeholder="Username"
            class="w-full p-3 rounded bg-white/80 text-black placeholder-gray-500
                   focus:outline-none focus:ring-2 focus:ring-green-500">

        <input type="password" name="password" placeholder="Password"
            class="w-full p-3 rounded bg-white/80 text-black placeholder-gray-500
                   focus:outline-none focus:ring-2 focus:ring-green-500">

        <button class="w-full bg-green-600 text-white p-3 rounded hover:bg-green-700 shadow-lg">
            Login
        </button>
    </form>
</div>
@endsection