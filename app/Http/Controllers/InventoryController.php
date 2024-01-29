<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Inventory::latest()->get();

        return view('inventory.index', ['data' => json_encode($data)]);
        // return response()->json($data);
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
        $data = new Inventory;
        $data->org = $request->org;
        $data->plant = $request->plant;
        $data->sold_to = $request->sold_to;
        $data->ship_to = $request->ship_to;
        $data->material = $request->material;
        $data->distrik = $request->distrik;
        $data->qty_minimum = $request->qty_minimum;
        $data->qty_bonus = $request->qty_bonus;
        $data->qty_status = $request->qty_status;
        $data->created_by = $request->created_by;
        $data->save();
        // $data = [
        //     'org' => $request->org,
        //     'plant' => $request->plant,
        //     'sold_to' => $request->sold_to,
        //     'ship_to' => $request->ship_to,
        //     'material' => $request->material,
        //     'distrik' => $request->distrik,
        //     'qty_minimum' => $request->qty_minimum,
        //     'qty_bonus' => $request->qty_bonus,
        //     'qty_status' => $request->qty_status,
        //     'created_by' => $request->created_by
        // ];

        // Inventory::create($data);
        return response()->json(['data' => $data, 'message' => 'Item added successfully']);
        // return redirect()->back()->with('newData', $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Request $request)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Inventory::find($id);
        $data->org = $request->org;
        $data->plant = $request->plant;
        $data->sold_to = $request->sold_to;
        $data->ship_to = $request->ship_to;
        $data->material = $request->material;
        $data->distrik = $request->distrik;
        $data->qty_minimum = $request->qty_minimum;
        $data->qty_bonus = $request->qty_bonus;
        $data->qty_status = $request->qty_status;
        $data->created_by = $request->created_by;
        $data->save();

        return response()->json(['data' => $data, 'message' => 'Item edited successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Inventory::find($id);
        $data->delete();

        return response()->json(['data' => $data, 'message' => 'Item deleted successfully']);
    }
}
