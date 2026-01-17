<?php

namespace App\Http\Controllers\Courier;

use App\Http\Controllers\Controller;
use App\Models\Courier\CourierVehicle;
use Illuminate\Http\Request;


class CourierVehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $dir="pages.courier.vehicle";

    public function index()
    {
           $vehicles=CourierVehicle::all();
        return view("$this->dir.index", ["vehicles"=>$vehicles]);
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
             $vehicle=new CourierVehicle();
        $vehicle->name=$request->name;
        $vehicle->type_id=$request->type_id;
        $vehicle->driver_id=$request->driver_id;
        $vehicle->save();

        return redirect("vehicles");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $vehicle=CourierVehicle::find($id);
        return view("$this->dir.show",["vehicle"=>$vehicle]); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
              $vehicle=CourierVehicle::find($id);
        return view("$this->dir.edit",["vehicle"=>$vehicle]);
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

        return redirect("vehicles");
    }

    /**
     * Remove the specified resource from storage.
     */
       public function delete(string $id){
        $vehicle=CourierVehicle::find($id);
        return view("$this->dir.delete",["vehicle"=>$vehicle]);
    }
    public function destroy(string $id)
    {
               $vehicle=CourierVehicle::find($id);
         $vehicle->delete();
        return redirect("vehicles");
    }
}
