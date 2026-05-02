<?php

namespace App\Http\Controllers\Api\Courier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courier\CourierType;


class CourierTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
          $types=CourierType::all();
        return response()->json(["types"=>CourierType::all()]);
   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $type=new CourierType();         
         $type->name=$request->name;
   
         $type->save();

         return response()->json([
            'message' => 'Courier Type saved successfully'           
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         return response()->json(CourierType::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $type=CourierType::find($id);         
         $type->name=$request->name;
        
         $type->update();

                   
           
       return response()->json([
            'message' => "Successfully updated"          
        ]);
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
          CourierType::find($id)->delete();
       return json_encode(["message"=>"Successfully Deleted"]);
    }
}
