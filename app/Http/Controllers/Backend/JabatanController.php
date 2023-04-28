<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\JabatanStoreRequest;
use App\Http\Requests\JabatanUpdateRequest;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index(Request $request)
    {
        $jabatans = Jabatan::all();
        if ($request->has('search')) {
            $jabatans = Jabatan::where('name_jabatan', 'like', "%{$request->search}%")->get();
        }
        return view('jabatans.index', compact('jabatans'));
    }

    public function create()
    {
        return view('jabatans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_jabatan' => 'required',
        ]);

        Jabatan::create($request->all());

        return redirect()->route('jabatans.index')->with('message', 'Add Jabatan Succesfully.');
    }

    public function show(Jabatan $jabatan)
    {
        return view('jabatan.show', compact('jabatan'));
    }

    public function edit(Jabatan $jabatan)
    {
        return view('jabatans.edit', compact('jabatan'));
    }

    public function update(Request $request, Jabatan $jabatan)
    {
        $request->validate([
            'name_jabatan' => 'required',
        ]);

        $jabatan->update($request->all());

        return redirect()->route('jabatans.index')->with('message', 'Jabatan berhasil diperbarui.');
    }

    public function destroy(Jabatan $jabatan)
    {
        $jabatan->delete();

        return redirect()->route('jabatans.index')->with('message', 'Jabatan berhasil dihapus.');
    }
}
