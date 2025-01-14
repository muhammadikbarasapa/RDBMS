<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plants = Plant::all();
        return view('index', data: compact('plants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_plant' => 'required|string|max:255',
            'name' => 'required|string|min:3|max:255',
            'type' => 'required|in:Bunga,Obat,Buah-Buahan,Kacang-Kacangan,Rumput',
            'additional' => 'nullable|string',
            'kode_plant'=> 'required|unique:plants,kode_plant',
        ]);

        Plant::create([
            'kode_plant' => $request->kode_plant,
            'name' => $request->name,
            'type' => $request->type,
            'additional' => $request->additional ?? '-',
        ]);

        return redirect()->route('plants.index')->with('add', 'Success add new plant!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plant = Plant::findOrFail($id);
        return view('edit', compact('plant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'type' => 'required|in:Bunga,Obat,Buah-Buahan,Kacang-Kacangan,Rumput',
            'additional' => 'nullable|string',
            'growth' => 'required', // Growth as a required string
        ]);

        $plant = Plant::findOrFail($id);

        // Decode existing growth JSON and append new growth data
        $growth = json_decode($plant->growth, true) ?? [];
        $newGrowth = [
            'tanggal' => date('d-m-Y'),
            'growth' => $request->growth,
        ];
        $growth[] = $newGrowth;

        $plant->update([
            'name' => $request->name,
            'type' => $request->type,
            'additional' => $request->additional,
            'growth' => json_encode($growth),
        ]);

        return redirect()->route('plants.index')->with('update', 'Success update a plant!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Plant::findOrFail($id)->delete();
        return redirect()->back()->with('delete', 'Plant successfully deleted!');
    }
}