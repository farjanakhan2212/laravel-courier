<?php

namespace App\Http\Controllers\Api\Courier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courier\CourierReceiver;


class CourierReceiverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $receivers=CourierReceiver::all();
         return response()->json(["receivers"=>CourierReceiver::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $receiver=new CourierReceiver();         
         $receiver->name=$request->name;
         $receiver->contact=$request->contact;
         $receiver->address=$request->address;
   
         $receiver->save();

         return response()->json([
            'message' => 'Receiver saved successfully'           
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         return response()->json(CourierReceiver::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          $receiver=CourierReceiver::find($id);         
         $receiver->name=$request->name;
         $receiver->contact=$request->contact;
         $receiver->address=$request->address;
   
         $receiver->update();

         return response()->json([
            'message' => ' successfully updated'           
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         CourierReceiver::find($id)->delete();
       return json_encode(["message"=>"Successfully Deleted"]);
    }
}
