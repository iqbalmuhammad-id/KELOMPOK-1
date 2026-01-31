@extends('layouts.tumbuhan')

@section('title', 'Tumbuhan')

@section('content')

<!-- ABJAD A - Z -->
<div class="flex flex-wrap gap-2 justify-center mb-10">

    @foreach(range('A','Z') as $char)
        <a href="/tumbuhan?letter={{ $char }}"
           class="px-4 py-2 rounded-xl font-semibold transition shadow
           {{ $letter == $char
                ? 'bg-green-600 text-white'
                : 'bg-white text-green-700 hover:bg-green-100' }}">
            {{ $char }}
        </a>
    @endforeach

</div>

@if($plant)

<div class="flex justify-center">
    <div class="bg-white rounded-3xl shadow p-6 w-full max-w-lg text-center">

        <!-- GAMBAR -->
        @if($plant->image)
            <img src="{{ asset('storage/'.$plant->image) }}"
                 class="w-52 h-52 object-contain mx-auto mb-4">
        @else
            <div class="w-52 h-52 mx-auto mb-4
                        flex items-center justify-center
                        bg-gray-200 rounded-xl text-gray-500">
                Belum ada gambar
            </div>
        @endif

        <!-- NAMA -->
        <h2 class="text-2xl font-bold mb-2">
            {{ $plant->name }}
        </h2>

        <!-- DESKRIPSI -->
        <p class="text-gray-700">
            {{ $plant->description }}
        </p>

    </div>
</div>

@else

<p class="text-center text-gray-600 text-lg mt-20">
    Belum ada tumbuhan untuk huruf <b>{{ $letter }}</b>
</p>

@endif

@endsection