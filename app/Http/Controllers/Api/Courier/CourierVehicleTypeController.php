<?php

namespace App\Http\Controllers\Api\Courier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courier\CourierVehicleType;


class CourierVehicleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $vehicletypes=CourierVehicleType::all();
         return response()->json(["vehicletypes"=>CourierVehicleType::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vehicletype = new Couriervehicletype();
    $vehicletype->name = $request->name;
    $vehicletype->save();

       return response()->json([
            'message' => 'Vehicle Type saved successfully'           
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         return response()->json(CourierVehicleType::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          $vehicletype = new Couriervehicletype();
    $vehicletype->name = $request->name;
    $vehicletype->update();

       return response()->json([
            'message' => 'successfully updated'           
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        CourierVehicleType::find($id)->delete();
       return json_encode(["message"=>"Successfully Deleted"]);
    }
}
