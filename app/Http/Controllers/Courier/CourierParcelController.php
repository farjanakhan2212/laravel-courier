<?php

namespace App\Http\Controllers\Courier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courier\CourierParcel;

class CourierParcelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $dir="pages.courier.parcel";

    public function index()
    {
        $parcels=CourierParcel::all();

      return view("$this->dir.index", ["parcels"=>$parcels]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view("$this->dir.create");
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $parcel=new CourierParcel();
        $parcel->type_id=$request->type_id;
        $parcel->sender_id=$request->sender_id;
        $parcel->receiver_id=$request->receiver_id;
        $parcel->weight=0;
        $parcel->created_at=$request->created_at;
        $parcel->update_at=$request->update_at;
        $parcel->is_csc=$request->is_csc;
        $parcel->branch_id=$request->branch_id;
        $parcel->vehical_id=$request->vehical_id;
        $parcel->shipment_id=$request->shipment_id;
        $parcel->person_id=$request->person_id;
        $parcel->price=$request->price;
        $parcel->remark=$request->remark;
        $parcel->paid_amount=$request->paid_amount;
        $parcel->vat=$request->vat;
        
        $parcel->save();

        return redirect("parcels");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
          $parcel=CourierParcel::find($id);
        return view("$this->dir.show",["parcel"=>$parcel]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
          $parcel=CourierParcel::find($id);
        return view("$this->dir.edit",["parcel"=>$parcel]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $parcel=Courierparcel::find($id);
        $parcel->type_id=$request->type_id;
        $parcel->sender_id=$request->sender_id;
        $parcel->receiver_id=$request->receiver_id;
        $parcel->weight=0;
        $parcel->created_at=$request->created_at;
        $parcel->update_at=$request->update_at;
        $parcel->is_csc=$request->is_csc;
        $parcel->branch_id=$request->branch_id;
        $parcel->vehical_id=$request->vehical_id;
        $parcel->shipment_id=$request->shipment_id;
        $parcel->person_id=$request->person_id;
        $parcel->price=$request->price;
        $parcel->remark=$request->remark;
        $parcel->paid_amount=$request->paid_amount;
        $parcel->vat=$request->vat;
       
        $parcel->update();
        return redirect("parcels");
    }

    /**
     * Remove the specified resource from storage.
     */
     public function delete(string $id){
        $parcel=CourierParcel::find($id);
        return view("$this->dir.delete",["parcel"=>$parcel]);
    }

    public function destroy(string $id)
    {
         $parcel=CourierParcel::find($id);
         $parcel->delete();
        return redirect("parcels");
    }
}
