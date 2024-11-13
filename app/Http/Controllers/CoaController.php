<?php

namespace App\Http\Controllers;

use App\Models\Coa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CoaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coa = Coa::all();

        return view('coa.index', compact('coa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('coa.create')->render();  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function editForm(Request $request)
    {
        $id = $request->id;
        $data = Coa::find($id);

        return response()->json(array(
            'status' => 'oke',
            'msg' => view('coa.edit', compact('data'))->render()
        ), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Coa $coa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coa $coa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coa $coa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coa $coa)
    {
        //
    }
}
