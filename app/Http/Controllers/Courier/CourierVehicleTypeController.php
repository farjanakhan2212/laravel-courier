<?php

namespace App\Http\Controllers\Courier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courier\CourierVehicleType;


class CourierVehicleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public $dir = "pages.courier.vehicle type";

    public function index()
    {
         $vehicletypes = CourierVehicleType::all();
    return view("$this->dir.index", ["vehicletypes" => $vehicletypes]);
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
          $vehicletype = new Couriervehicletype();
    $vehicletype->name = $request->name;
    $vehicletype->save();

    return redirect("vehicletypes");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
            $vehicletype = CourierVehicleType::find($id);
    return view("$this->dir.show", ["vehicletype" => $vehicletype]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
            $vehicletype = CourierVehicleType::find($id);
    return view("$this->dir.edit", ["vehicletype" => $vehicletype]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            $vehicletype = CourierVehicleType::find($id);
     
    $vehicletype->name = $request->name;
    $vehicletype->update();

    return redirect("vehicletypes");
    }

    /**
     * Remove the specified resource from storage.
     */
 public function delete(string $id)
  {
    $vehicletypes = CourierVehicleType::find($id);
    return view("$this->dir.delete", ["vehicletype" => $vehicletypes]);
  }
    
    public function destroy(string $id)
    {
         $vehicletypes = Couriervehicletype::find($id);
    $vehicletypes->delete();
    return redirect("vehicletypes");
    }
}
