<?php

namespace App\Http\Controllers\Api\Courier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courier\CourierVehicle;


class CourierVehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $vehicles=CourierVehicle::all();
         return response()->json(["vehicles"=>CourierVehicle::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $vehicle=new CourierVehicle();
        $vehicle->name=$request->name;
        $vehicle->type_id=$request->type_id;
        $vehicle->driver_id=$request->driver_id;
        $vehicle->save();

         return response()->json([
            'message' => 'Vehicle saved successfully'           
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         return response()->json(CourierVehicle::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          $vehicle=CourierVehicle::find($id);
        
        $vehicle->name=$request->name;
        $vehicle->type_id=$request->type_id;
        $vehicle->driver_id=$request->driver_id;
        $vehicle->update();

         return response()->json([
            'message' => "Successfully updated"          
        ]);
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
          CourierVehicle::find($id)->delete();
       return json_encode(["message"=>"Successfully Deleted"]);
    
    }
}
