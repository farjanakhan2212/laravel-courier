<?php

namespace App\Http\Controllers\Parcel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Parcel\CourierSender;

class CourierSenderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $dir="pages.courier.sender";

    public function index()
    {
          $senders=CourierSender::all();
        return view("$this->dir.index", ["senders"=>$senders]);
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
        $sender=new CourierSender();
        $sender->name=$request->name;
        $sender->contact=$request->contact;
        $sender->address=$request->address;
        $sender->save();

        return redirect("senders");


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $sender=CourierSender::find($id);
        return view("$this->dir.show",["sender"=>$sender]);  
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $sender=CourierSender::find($id);
        return view("$this->dir.edit",["sender"=>$sender]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sender= CourierSender::find($id);
        $sender->name=$request->name;
        $sender->contact=$request->contact;
        $sender->address=$request->address;
        $sender->update();
        return redirect("senders");

    }

    /**
     * Remove the specified resource from storage.
     */
     public function delete(string $id){
        $sender=CourierSender::find($id);
        return view("$this->dir.delete",["sender"=>$sender]);
    }

    public function destroy(string $id)
    {
           $sender=CourierSender::find($id);
         $sender->delete();
        return redirect("senders");
    }
}
