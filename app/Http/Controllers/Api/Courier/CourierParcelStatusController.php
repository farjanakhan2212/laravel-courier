<?php

namespace App\Http\Controllers\Api\Courier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courier\CourierParcelStatus;


class CourierParcelStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statuses=CourierParcelStatus::all();
        return response()->json (data: ["statuses"=>CourierParcelStatus::all()]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $statuses= new CourierParcelStatus();
        $statuses->name=$request->name;
    
     $statuses->save();
       return response()->json([
            'message' => 'Status saved successfully'           
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         return response()->json(CourierParcelStatus::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          $statuses= CourierParcelStatus::find($id); 
        $statuses->name=$request->name;
    
     $statuses->update();

     return response()->json([
            'message' => 'Successfully updated'           
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
          CourierParcelStatus::find($id)->delete();
       return json_encode(["message"=>"Successfully Deleted"]);
    }
}
