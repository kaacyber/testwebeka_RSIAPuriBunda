<?php

namespace App\Http\Controllers\Backend;

use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use App\Models\Jabatan;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class KaryawanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $karyawans = Karyawan::query()->with(['unit', 'jabatan']);
            return DataTables::of($karyawans)
                ->addColumn('jabatan', function ($karyawan) {
                    return $karyawan->jabatan->pluck('name_jabatan')->implode(', ');
                })
                ->addColumn('aksi', function ($row) {
                    $btnEdit = '<a href="' . route("karyawans.edit", $row->id) . '" class="btn btn-sm btn-primary me-2">Edit</a>';
                    $btnDelete = '<form action="' . route("karyawans.destroy", $row->id) . '" method="POST" class="d-inline">';
                    $btnDelete .= csrf_field();
                    $btnDelete .= method_field('DELETE');
                    $btnDelete .= '<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure?\')">Delete</button></form>';
                    $btnContainer = '<div class="d-flex justify-content-end">' . $btnEdit . $btnDelete . '</div>';
                    return $btnContainer;
                })
                ->rawColumns(['aksi'])
                ->make();
        }
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
            'jabatann_id' => 'array',
            'jabatanm_id.*' => 'exists:jabatans,id',
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
        $karyawan->jabatan()->attach($request->jabatann_id);
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
            'jabatann_id' => 'required|array',
            'jabatanm_id.*' => 'exists:jabatans,id',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $karyawan->name = $request->input('name');
        $karyawan->username = $request->input('username');
        $karyawan->unit_id = $request->input('unit_id');
        $karyawan->tanggal_bergabung = $request->input('tanggal_bergabung');
        $karyawan->save();

        $karyawan->jabatan()->attach($request->input('jabatan_id'));
        $karyawan->jabatan()->attach($request->input('jabatann_id'));

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
