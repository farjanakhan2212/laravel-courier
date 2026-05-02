<?php

namespace App\Http\Controllers\Courier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courier\CourierReceiver;


class CourierReceiverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $dir="pages.courier.receiver";

    public function index()
    {
          $receivers=CourierReceiver::all();
        return view("$this->dir.index", ["receivers"=>$receivers]);
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
          $receiver=new CourierReceiver();
        $receiver->name=$request->name;
        $receiver->contact=$request->contact;
        $receiver->address=$request->address;
        $receiver->save();

        return redirect("receivers");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $receiver=CourierReceiver::find($id);
        return view("$this->dir.show",["receiver"=>$receiver]); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
             $receiver=CourierReceiver::find($id);
        return view("$this->dir.edit",["receiver"=>$receiver]);
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
        return redirect("receivers");
    }

    /**
     * Remove the specified resource from storage.
     */
      public function delete(string $id){
        $receiver=CourierReceiver::find($id);
        return view("$this->dir.delete",["receiver"=>$receiver]);
    }

    public function destroy(string $id)
    {
                $receiver=CourierReceiver::find($id);
         $receiver->delete();
        return redirect("receivers");
    }
}
