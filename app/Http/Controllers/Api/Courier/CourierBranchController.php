<?php

namespace App\Http\Controllers\Api\Courier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courier\CourierBranch;


class CourierBranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $branches=CourierBranch::all();
          return response()->json(["branches"=>CourierBranch::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
              $branch=new CourierBranch();         
         $branch->name=$request->name;
   
         $branch->save();

         return response()->json([
            'message' => 'Sender saved successfully'           
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         return response()->json(CourierBranch::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $branch=CourierBranch::find($id);         
         $branch->name=$request->name;
        
         $branch->update();

                   
           
       return response()->json([
            'message' => "Successfully updated"          
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        CourierBranch::find($id)->delete();
       return json_encode(["message"=>"Successfully Deleted"]);
    }
}
