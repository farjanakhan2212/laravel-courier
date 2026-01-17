<?php

namespace App\Http\Controllers\Courier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courier\CourierShipment;


class CourierShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $dir="pages.courier.shipment";

    public function index()
    {
         $shipments=CourierShipment::all();
        return view("$this->dir.index", ["shipments"=>$shipments]);
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
        $shipment=new CourierShipment();
        $shipment->name=$request->name;
        $shipment->save();

        return redirect("shipments");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $shipment=CourierShipment::find($id);
        return view("$this->dir.show",["shipment"=>$shipment]); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
          $shipment=CourierShipment::find($id);
        return view("$this->dir.edit",["shipment"=>$shipment]); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          $shipment=CourierShipment::find($id);
        
        $shipment->name=$request->name;
        $shipment->update();

        return redirect("shipments");
    }

    /**
     * Remove the specified resource from storage.
     */
     public function delete(string $id){
        $shipment=CourierShipment::find($id);
        return view("$this->dir.delete",["shipment"=>$shipment]);
    }
    public function destroy(string $id)
    {
           $shipment=CourierShipment::find($id);
         $shipment->delete();
        return redirect("shipments");
    }
}
