<?php

namespace App\Http\Controllers;

use App\Models\Units;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = Units::all();
        return view('units.index', ['units' => $units]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('units.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        Units::create([
            'name' => $data['name'],
            'slug' => $data['slug'],
        ]);

        return redirect()->route('units.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Units $units)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Units $units, $id)
    {
        $unit = Units::findOrFail($id);
        return view('units.edit', ['unit' => $unit]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Units $units, $id)
    {
        $data = $request->all();

        Units::findOrFail($id)->update(['name' => $data['name'], 'slug' => $data['slug']]);

        return redirect()->route('units.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Units $units, $id)
    {
        Units::findOrFail($id)->delete();

        return redirect()->route('units.index');
    }
}
