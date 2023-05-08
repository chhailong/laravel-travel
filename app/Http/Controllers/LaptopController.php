<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;

class LaptopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laptop = Laptop::all();
        return response()->json([
            'success' => true,
            'message' => 'laptops List',
            'data' => $laptop
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'imageurl1' => 'required',
            'cpu' => 'required',
            'ram' => 'required',
            'gpu' => 'required',
            'storage' => 'required',
            'display' => 'required',
            'battery' => 'required',
            'price' => 'required',
            


        ]);
        return Laptop::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        return Laptop::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $laptop = Laptop::find($id);
        $laptop->update($request->all());
        return $laptop;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Laptop::destroy($id);
    }
}
