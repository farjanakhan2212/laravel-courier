<?php

namespace App\Http\Controllers\Courier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courier\CourierParcelHistory;


class CourierParcelHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $dir="pages.courier.history";

    public function index()
    {
           $histories=CourierParcelHistory::all();

      return view("$this->dir.index", ["histories"=>$histories]);
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
          $history=new CourierParcelHistory();
        $history->parcel_id=$request->parcel_id;
        $history->status_id=$request->status_id;
        $history->person_id=$request->person_id;
        $history->branch_id=$request->branch_id;
        $history->created_at=$request->created_at;
        $history->remark=$request->remark;
        
        $history->save();

        return redirect("history");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
           $history=CourierParcelHistory::find($id);
        return view("$this->dir.show",["history"=>$history]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
            $history=CourierParcelHistory::find($id);
        return view("$this->dir.edit",["history"=>$history]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            $history=CourierParcelHistory::find($id);
        
        $history->parcel_id=$request->parcel_id;
        $history->status_id=$request->status_id;
        $history->person_id=$request->person_id;
        $history->branch_id=$request->branch_id;
        $history->created_at=$request->created_at;
        $history->remark=$request->remark;
        
        $history->update();

        return redirect("history");
    }

    /**
     * Remove the specified resource from storage.
     */
     public function delete(string $id){
        $history=CourierParcelHistory::find($id);
        return view("$this->dir.delete",["history"=>$history]);
    }
    public function destroy(string $id)
    {
        $history=CourierParcelHistory::find($id);
         $history->delete();
        return redirect("history");
    }
}
