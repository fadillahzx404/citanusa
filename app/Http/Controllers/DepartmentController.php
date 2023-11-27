<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\Units;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Departments::all();
        return view('departments.index', ['departments' => $departments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $units = Units::all();
        return view('departments.create', ['units' => $units]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        Departments::create([
            'name' => $data['name'],
            'unit_id' => $data['unit_id'],
            'slug' => $data['slug'],
        ]);

        return redirect()->route('departments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Departments $departments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departments $departments, $id)
    {
        $department = Departments::findOrFail($id);
        $units = Units::all();
        return view('departments.edit', ['department' => $department, 'units' => $units]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Departments $departments, $id)
    {
        $data = $request->all();

        Departments::findOrFail($id)->update(['name' => $data['name'], 'unit_id' => $data['unit_id'], 'slug' => $data['slug']]);

        return redirect()->route('departments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departments $departments, $id)
    {
        Departments::findOrFail($id)->delete();

        return redirect()->route('departments.index');
    }
}
