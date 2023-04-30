<?php

namespace App\Http\Controllers\Backend;

use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\JabatanStoreRequest;
use App\Http\Requests\JabatanUpdateRequest;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $jabatans = Jabatan::query();
            if ($request->has('search')) {
                $search = $request->search['value'];
                $jabatans->where(function ($query) use ($search) {
                    $query->where('name_jabatan', 'like', "%{$search}%")
                        ->orWhere('name_jabatan', 'like', "%{$search}%");
                });
            }

            return DataTables::of($jabatans)
                ->addColumn('aksi', function ($row) {
                    $btn = '<a href="' . route("jabatans.edit", $row->id) . '" class="btn btn-sm btn-primary mr-2">Edit</a>';
                    $btn .= '<form action="' . route("jabatans.destroy", $row->id) . '" method="POST" class="d-inline">';
                    $btn .= csrf_field();
                    $btn .= method_field('DELETE');
                    $btn .= '<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure?\')">Delete</button></form>';
                    return $btn;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
        return view('jabatans.index');
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
