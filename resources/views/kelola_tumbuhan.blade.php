@extends('layouts.admintumbuhan')

@section('content')

<div class="flex justify-center">
    <div class="w-full max-w-4xl bg-white rounded-2xl shadow-lg p-8">

        <h2 class="text-3xl font-bold text-green-700 mb-6 text-center">
            Kelola Tumbuhan
        </h2>

        {{-- NOTIFIKASI --}}
        @if(session('success'))
            <div class="mb-6 bg-green-100 text-green-800 px-4 py-3 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        {{-- FORM TAMBAH --}}
        <form action="/kelola-tumbuhan/simpan" method="POST" enctype="multipart/form-data"
              class="space-y-4 mb-10">
            @csrf

            <div>
                <label class="block font-medium mb-1">Nama Tumbuhan</label>
                <input type="text" name="name" required
                       class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-400">
            </div>

            <div>
                <label class="block font-medium mb-1">Deskripsi</label>
                <textarea name="description" rows="3" required
                          class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-400"></textarea>
            </div>

            <div>
                <label class="block font-medium mb-1">Foto Tumbuhan</label>

                <label class="flex items-center gap-4 cursor-pointer">
                    <span class="bg-green-600 text-white px-4 py-2 rounded-lg">
                        Pilih Foto
                    </span>
                    <span id="file-name" class="text-gray-600 text-sm">
                        Belum ada file dipilih
                    </span>
                    <input type="file" name="image" accept="image/*" hidden
                           onchange="document.getElementById('file-name').innerText = this.files[0]?.name">
                </label>
            </div>

            <button type="submit"
                    class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
                Simpan Tumbuhan
            </button>
        </form>

        {{-- TABEL --}}
        <table class="w-full text-sm border">
            <thead class="bg-green-100">
                <tr>
                    <th class="border px-3 py-2">No</th>
                    <th class="border px-3 py-2">Foto</th>
                    <th class="border px-3 py-2">Nama</th>
                    <th class="border px-3 py-2">Deskripsi</th>
                    <th class="border px-3 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($plants as $i => $plant)
                <tr class="align-top">
                    <td class="border px-3 py-2 text-center">{{ $i+1 }}</td>

                    <td class="border px-3 py-2 text-center">
                        @if($plant->image)
                            <img src="{{ asset('storage/'.$plant->image) }}"
                                 class="w-16 h-16 object-cover rounded mx-auto mb-2">
                        @endif
                    </td>

                    {{-- FORM EDIT --}}
                    <form action="/kelola-tumbuhan/update/{{ $plant->id }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <td class="border px-3 py-2">
                            <input type="text" name="name" value="{{ $plant->name }}"
                                   class="w-full border rounded px-2 py-1">
                        </td>

                        <td class="border px-3 py-2">
                            <textarea name="description" rows="2"
                                      class="w-full border rounded px-2 py-1">{{ $plant->description }}</textarea>
                        </td>

                        <td class="border px-3 py-2 text-center space-y-1">
                            <button class="text-green-600 hover:underline block w-full">
                                Simpan
                            </button>
                    </form>

                            <form action="/kelola-tumbuhan/hapus/{{ $plant->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 hover:underline w-full">
                                    Hapus
                                </button>
                            </form>
                        </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-6 text-gray-500">
                        Belum ada data
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>

@endsection