<?php

namespace App\Http\Controllers\Courier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courier\CourierParcelStatus;

class CourierParcelStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $dir="pages.courier.status";

    public function index()
    {
          $statuse=CourierParcelStatus::all();
        return view("$this->dir.index", ["statuse"=>$statuse]);
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
         $status=new CourierParcelStatus();
        $status->name=$request->name;
        $status->save();

        return redirect("statuses");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
          $status=CourierParcelStatus::find($id);
        return view("$this->dir.show",["status"=>$status]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
          $status=CourierParcelStatus::find($id);
        return view("$this->dir.edit",["status"=>$status]);
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          $status=CourierParcelStatus::find($id);
        
        $status->name=$request->name;
        $status->update();

        return redirect("statuses");
    }

    /**
     * Remove the specified resource from storage.
     */
       public function delete(string $id){
        $status=CourierParcelStatus::find($id);
        return view("$this->dir.delete",["status"=>$status]);
    }
    public function destroy(string $id)
    {
          $status=CourierParcelStatus::find($id);
         $status->delete();
        return redirect("statuses");
    }
}
