@extends('layouts.sippaud')

@section('content')
<div class="text-center mt-16">
    <h1 class="text-4xl font-bold mb-2">SIPPAUD</h1>
    <p class="text-lg mb-10">
        Sistem Informasi Pembelajaran Pendidikan Usia Dini
    </p>

    <div class="grid grid-cols-2 gap-10 max-w-4xl mx-auto">
        <a href="/hewan" class="bg-white/80 text-black p-12 rounded-xl text-3xl font-bold hover:scale-105 transition">
            🐯 HEWAN
        </a>

        <a href="/tumbuhan" class="bg-white/80 text-black p-12 rounded-xl text-3xl font-bold hover:scale-105 transition">
            🌿 TUMBUHAN
        </a>
    </div>
</div>
@endsection