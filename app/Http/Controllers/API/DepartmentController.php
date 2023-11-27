<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Models\Departments;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function GetAll(Request $request)
    {
        if ($request->search) {
            return Departments::search($request->search)->get();
        } else {
            return Departments::all();
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function GetById(Departments $departments,$id)
    {
         return Departments::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Departments $departments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departments $departments)
    {
        //
    }
}
