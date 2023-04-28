<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use App\Models\Jabatan;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::with(['unit', 'jabatan'])->get();

        return view('karyawans.index', compact('karyawans'));
    }

    public function create()
    {
        $jabatans = Jabatan::all();
        $units = Unit::all();
        return view('karyawans.create', compact('jabatans', 'units'));
    }

    public function store(Request $request)
    {
        // Validasi inputan
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:karyawans',
            'unit_id' => 'required|exists:units,id',
            'tanggal_bergabung' => 'required|date',
            'jabatan_id' => 'required|array',
            'jabatan_id.*' => 'required|exists:jabatans,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Buat karyawan baru
        $karyawan = new Karyawan;
        $karyawan->name = $request->name;
        $karyawan->username = $request->username;
        $karyawan->unit_id = $request->unit_id;
        $karyawan->tanggal_bergabung = $request->tanggal_bergabung;
        $karyawan->save();

        // Attach jabatan ke karyawan
        $karyawan->jabatan()->attach($request->jabatan_id);
        return redirect()->route('karyawans.index')->with('message', 'Karyawan berhasil ditambahkan.');
    }


    public function edit(Karyawan $karyawan)
    {
        $units = Unit::all();
        $jabatans = Jabatan::all();
        return view('karyawans.edit', compact('karyawan', 'units', 'jabatans'));
    }

    public function update(Request $request, Karyawan $karyawan)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:karyawans',
            'unit_id' => 'required|exists:units,id',
            'tanggal_bergabung' => 'required|date',
            'jabatan_id' => 'required|array',
            'jabatan_id.*' => 'required|exists:jabatans,id',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $karyawan->name = $request->input('name');
        $karyawan->username = $request->input('username');
        $karyawan->unit_id = $request->input('unit_id');
        $karyawan->tanggal_bergabung = $request->input('tanggal_bergabung');
        $karyawan->save();

        $karyawan->jabatan()->sync($request->input('jabatan_id'));

        return redirect()->route('karyawans.index')->with('message', 'Data karyawan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->jabatan()->detach();
        $karyawan->delete();
        return redirect()->route('karyawans.index')->with('message', 'Karyawan berhasil dihapus.');
    }
}
