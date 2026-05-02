<?php

namespace App\Http\Controllers\Courier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courier\CourierType;


class CourierTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $dir="pages.courier.courier type";

    public function index()
    {
        $types=CourierType::all();
        return view("$this->dir.index", ["types"=>$types]);
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
          $type=new CourierType();
        $type->name=$request->name;
        $type->save();

        return redirect("types");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
          $type=CourierType::find($id);
        return view("$this->dir.show",["type"=>$type]);  
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
            $type=CourierType::find($id);
        return view("$this->dir.edit",["type"=>$type]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            $type=CourierType::find($id);
        
        $type->name=$request->name;
        $type->update();

        return redirect("types");
    }

    /**
     * Remove the specified resource from storage.
     */
     public function delete(string $id){
        $type=CourierType::find($id);
        return view("$this->dir.delete",["type"=>$type]);
    }

    public function destroy(string $id)
    {
            $type=Couriertype::find($id);
         $type->delete();
        return redirect("types");
    }
}
