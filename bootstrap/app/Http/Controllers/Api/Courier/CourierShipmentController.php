<?php

namespace App\Http\Controllers\Api\Courier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courier\CourierShipment;


class CourierShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $shipments=CourierShipment::all();
          return response()->json(["shipments"=>CourierShipment::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
               $shipment=new CourierShipment();         
         $shipment->name=$request->name;
   
         $shipment->save();

         return response()->json([
            'message' => 'Shipment saved successfully'           
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         return response()->json(CourierShipment::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $shipment=CourierShipment::find($id);         
         $shipment->name=$request->name;
        
         $shipment->update();

                   
           
       return response()->json([
            'message' => "Successfully updated"          
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         CourierShipment::find($id)->delete();
       return json_encode(["message"=>"Successfully Deleted"]);
    }
}
