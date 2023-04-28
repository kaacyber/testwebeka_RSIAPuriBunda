<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index(Request $request)
    {
        $units = Unit::all();
        if ($request->has('search')) {
            $units = Unit::where('name_unit', 'like', "%{$request->search}%")->get();
        }
        return view('units.index', compact('units'));
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
