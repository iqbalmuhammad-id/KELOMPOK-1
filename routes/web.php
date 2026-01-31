<?php

use App\Http\Controllers\AdminAuthController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

/* =======================
   AUTH
======================= */
Route::get('/', [AdminAuthController::class, 'loginForm']);
Route::post('/login', [AdminAuthController::class, 'login']);
Route::get('/logout', [AdminAuthController::class, 'logout']);

Route::get('/dashboard', function () {
    if (!session('admin')) return redirect('/');
    return view('dashboard');
});

/* =======================
   KELOLA HEWAN (ADMIN)
======================= */
Route::get('/kelola-hewan', function () {
    if (!session('admin')) return redirect('/');
    $animals = DB::table('animals')->orderBy('name')->get();
    return view('kelola_hewan', compact('animals'));
});

Route::post('/kelola-hewan/simpan', function (Request $request) {

    $path = null;
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('animals', 'public');
    }

    DB::table('animals')->insert([
        'name' => $request->name,
        'description' => $request->description,
        'image' => $path
    ]);

    return redirect('/kelola-hewan')->with('success', 'Data hewan berhasil ditambahkan');
});

Route::delete('/kelola-hewan/hapus/{id}', function ($id) {
    DB::table('animals')->where('id', $id)->delete();
    return redirect('/kelola-hewan')->with('success', 'Data hewan berhasil dihapus');
});

Route::post('/kelola-hewan/update/{id}', function (Request $request, $id) {

    $animal = DB::table('animals')->where('id', $id)->first();
    $path = $animal->image;

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('animals', 'public');
    }

    DB::table('animals')->where('id', $id)->update([
        'name' => $request->name,
        'description' => $request->description,
        'image' => $path
    ]);

    return redirect('/kelola-hewan')->with('success', 'Data hewan berhasil diubah');
});

/* =======================
   HALAMAN HEWAN (ANAK)
======================= */
Route::get('/hewan', function (Request $request) {

    $letter = $request->letter ?? 'A';

    $animal = DB::table('animals')
        ->where('name', 'LIKE', $letter.'%')
        ->orderBy('name')
        ->first();

    return view('hewan', compact('letter', 'animal'));
});

/* =======================
   KELOLA TUMBUHAN (ADMIN)
======================= */
Route::get('/kelola-tumbuhan', function () {
    if (!session('admin')) return redirect('/');
    $plants = DB::table('plants')->orderBy('name')->get();
    return view('kelola_tumbuhan', compact('plants'));
});

Route::post('/kelola-tumbuhan/simpan', function (Request $request) {

    $path = null;
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('plants', 'public');
    }

    DB::table('plants')->insert([
        'name' => $request->name,
        'description' => $request->description,
        'image' => $path
    ]);

    return redirect('/kelola-tumbuhan')->with('success', 'Data tumbuhan berhasil ditambahkan');
});

Route::delete('/kelola-tumbuhan/hapus/{id}', function ($id) {
    DB::table('plants')->where('id', $id)->delete();
    return redirect('/kelola-tumbuhan')->with('success', 'Data tumbuhan berhasil dihapus');
});

Route::post('/kelola-tumbuhan/update/{id}', function (Request $request, $id) {

    $plant = DB::table('plants')->where('id', $id)->first();
    $path = $plant->image;

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('plants', 'public');
    }

    DB::table('plants')->where('id', $id)->update([
        'name' => $request->name,
        'description' => $request->description,
        'image' => $path
    ]);

    return redirect('/kelola-tumbuhan')->with('success', 'Data tumbuhan berhasil diubah');
});

/* =======================
   HALAMAN TUMBUHAN (ANAK)
======================= */
Route::get('/tumbuhan', function (Request $request) {

    $letter = $request->letter ?? 'A';

    $plant = DB::table('plants')
        ->where('name', 'LIKE', $letter.'%')
        ->orderBy('name')
        ->first();

    return view('tumbuhan', compact('letter', 'plant'));
});

/* =======================
   TENTANG SIPPAUD
======================= */
Route::get('/tentang-sippaud', function () {
    if (!session('admin')) return redirect('/');
    return view('tentang_sippaud');
});

