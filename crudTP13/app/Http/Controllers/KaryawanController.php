<?php

namespace App\Http\Controllers;

use App\Models\KaryawanModel;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{

    public function index()
    {
        $karyawan = KaryawanModel::orderBy('created_at', 'DESC')->get();
        return view('karyawan.index')->with(compact('karyawan'));
    }

    public function create()
    {
        return view('karyawan.create');
    }
    public function store(Request $request)
    {
        KaryawanModel::create($request->all());

        return redirect()->route('karyawan.index')->with('success', 'Data berhasil ditambahkan');
    }
    public function show(string $id)
    {
        //
    }
    public function edit(string $id)
    {
        $karyawan = KaryawanModel::findOrFail($id);
        return view('karyawan.update')->with(compact('karyawan'));
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'posisi' => 'required',
            'gaji' => 'required'
        ]);

        KaryawanModel::where('id', $id)->update([
            'nama' => $request->nama,
            'posisi' => $request->posisi,
            'gaji' => $request->gaji
        ]);

        return redirect()->route('karyawan.index')->with('success', 'Data berhasil diubah');
    }
    public function destroy(string $id)
    {
        $karyawan = KaryawanModel::findOrFail($id);
        $karyawan->delete();

        return redirect()->route('karyawan.index')->with('success', 'Data berhasil dihapus');
    }
}
