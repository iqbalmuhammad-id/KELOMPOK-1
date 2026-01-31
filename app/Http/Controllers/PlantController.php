<?php

class Plant extends Model
{
    protected $fillable = [
        'nama',
        'huruf',
        'kategori',   // buah / sayur
        'gambar',
        'deskripsi'
    ];
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plant;

class PlantController extends Controller
{
    // Tampilkan semua tumbuhan
    public function index()
    {
        $plants = Plant::orderBy('huruf')->get();
        return view('admin.plants.index', compact('plants'));
    }

    // Form tambah tumbuhan
    public function create()
    {
        return view('admin.plants.create');
    }

    // Simpan data tumbuhan
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'huruf' => 'required|max:1',
            'kategori' => 'required', // buah / sayur
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png',
            'deskripsi' => 'nullable'
        ]);

        $namaFile = null;

        if ($request->hasFile('gambar')) {
            $namaFile = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('plants'), $namaFile);
        }

        Plant::create([
            'nama' => $request->nama,
            'huruf' => strtoupper($request->huruf),
            'kategori' => $request->kategori,
            'gambar' => $namaFile,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect('/admin/tumbuhan')->with('success', 'Data tumbuhan berhasil ditambahkan');
    }
}