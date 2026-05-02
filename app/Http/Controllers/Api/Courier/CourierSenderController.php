<?php

namespace App\Http\Controllers\Api\Courier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Parcel\CourierSender;


class CourierSenderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $senders=CourierSender::all();

        return response()->json(["senders"=>CourierSender::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           $sender=new CourierSender();         
         $sender->name=$request->name;
         $sender->contact=$request->contact;
         $sender->address=$request->address;
   
         $sender->save();

         return response()->json([
            'message' => 'Sender saved successfully'           
        ]);
          // return redirect("senders");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         return response()->json(CourierSender::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sender=CourierSender::find($id);         
        $sender->name=$request->name;
         $sender->contact=$request->contact;
         $sender->address=$request->address;
   
         $sender->update();

         return response()->json([
            'message' => ' successfully updated'           
        ]);
          // return redirect("senders");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
          CourierSender::find($id)->delete();
       return json_encode(["message"=>"Successfully Deleted"]);
    }
}
