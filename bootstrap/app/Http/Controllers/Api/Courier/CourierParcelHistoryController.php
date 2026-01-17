<?php

namespace App\Http\Controllers\Api\Courier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courier\CourierParcelHistory;


class CourierParcelHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $histories=CourierParcelHistory::all();
        return response()->json(["histories"=>CourierParcelHistory::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $history=new CourierParcelHistory();         
         $history->parcel_id=$request->parcel_id;
         $history->status_id=$request->status_id;
          $history->remark=$request->remark;
         $history->person_id=$request->person_id;
         $history->created_at=$request->created_at;
         $history->branch_id=$request->branch_id;
        

   
         $history->save();

         return response()->json([
            'message' => 'History saved successfully'           
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
           return response()->json(CourierParcelHistory::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          $history=CourierParcelHistory::find($id);          
         $history->parcel_id=$request->parcel_id;
         $history->status_id=$request->status_id;
          $history->remark=$request->remark;
         $history->person_id=$request->person_id;
         $history->created_at=$request->created_at;
         $history->branch_id=$request->branch_id;
        

   
         $history->update();

         return response()->json([
            'message' => 'Successfully updated'           
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
          CourierParcelHistory::find($id)->delete();
       return json_encode(["message"=>"Successfully Deleted"]);
    }
}
