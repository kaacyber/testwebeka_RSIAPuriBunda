<?php

namespace App\Http\Controllers\Backend;

use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $units = Unit::query();
            if ($request->has('search')) {
                $search = $request->search['value'];
                $units->where(function ($query) use ($search) {
                    $query->where('name_unit', 'like', "%{$search}%")
                        ->orWhere('name_unit', 'like', "%{$search}%");
                });
            }

            return DataTables::of($units)
                ->addColumn('aksi', function ($row) {
                    $btn = '<a href="' . route("units.edit", $row->id) . '" class="btn btn-sm btn-primary mr-2">Edit</a>';
                    $btn .= '<form action="' . route("units.destroy", $row->id) . '" method="POST" class="d-inline">';
                    $btn .= csrf_field();
                    $btn .= method_field('DELETE');
                    $btn .= '<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure?\')">Delete</button></form>';
                    return $btn;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
        return view('units.index');
    }

    public function create()
    {
        return view('units.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_unit' => 'required',
        ]);

        Unit::create($request->all());

        return redirect()->route('units.index')->with('message', 'Add Unit Succesfully.');
    }

    public function edit(Unit $unit)
    {
        return view('units.edit', compact('unit'));
    }

    public function update(Request $request, Unit $unit)
    {
        $request->validate([
            'name_unit' => 'required',
        ]);

        $unit->update($request->all());

        return redirect()->route('units.index')->with('message', 'Unit Updated Succesfully.');
    }

    public function destroy(Unit $unit)
    {
        $unit->delete();

        return redirect()->route('units.index')->with('message', 'Unit Delete Succesfully.');
    }
}
