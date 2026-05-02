<?php

namespace App\Http\Controllers\Api\Courier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courier\CourierParcel;


class CourierParcelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $parcels=CourierParcel::all();
         return response()->json(["parcels"=>CourierParcel::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           $parcel=new CourierParcel();         
         $parcel->type_id=$request->type_id;
          $parcel->remark=$request->remark;
         $parcel->sender_id=$request->sender_id;
         $parcel->receiver_id=$request->receiver_id;
         $parcel->weight=$request->weight;
         $parcel->created_at=$request->created_at;
         $parcel->updated_at=$request->updated_at;
         $parcel->is_csc=$request->is_csc;
         $parcel->branch_id=$request->branch_id;
         $parcel->vehical_id=$request->vehical_id;
         $parcel->shipment_id=$request->shipment_id;
         $parcel->person_id=$request->person_id;
         $parcel->price=$request->price;
        
         $parcel->paid_amount=$request->paid_amount;
         $parcel->vat=$request->vat;

   
         $parcel->save();

         return response()->json([
            'message' => 'Parcel saved successfully'           
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
          return response()->json(CourierParcel::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $parcel=CourierParcel::find($id);         
        $parcel->type_id=$request->type_id;
          $parcel->remark=$request->remark;
         $parcel->sender_id=$request->sender_id;
         $parcel->receiver_id=$request->receiver_id;
         $parcel->weight=$request->weight;
         $parcel->created_at=$request->created_at;
         $parcel->updated_at=$request->updated_at;
         $parcel->is_csc=$request->is_csc;
         $parcel->branch_id=$request->branch_id;
         $parcel->vehical_id=$request->vehical_id;
         $parcel->shipment_id=$request->shipment_id;
         $parcel->person_id=$request->person_id;
         $parcel->price=$request->price;
        
         $parcel->paid_amount=$request->paid_amount;
         $parcel->vat=$request->vat;
        
         $parcel->update();

                   
           
       return response()->json([
            'message' => "Successfully updated"          
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         CourierParcel::find($id)->delete();
       return json_encode(["message"=>"Successfully Deleted"]);
    }
}
