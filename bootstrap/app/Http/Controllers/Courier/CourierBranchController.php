<?php

namespace App\Http\Controllers\Courier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courier\CourierBranch;


class CourierBranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $dir="pages.courier.branch";

    public function index()
    {
         $branchs=CourierBranch::all();
        return view("$this->dir.index", ["branchs"=>$branchs]);
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
        $branch=new CourierBranch();
        $branch->name=$request->name;
        $branch->save();

        return redirect("branches");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $branch=CourierBranch::find($id);
        return view("$this->dir.show",["branch"=>$branch]);  
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
          $branch=CourierBranch::find($id);
        return view("$this->dir.edit",["branch"=>$branch]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          $branch=CourierBranch::find($id);
        
        $branch->name=$request->name;
        $branch->update();

        return redirect("branches");
    }

    /**
     * Remove the specified resource from storage.
     */
     public function delete(string $id){
        $branch=CourierBranch::find($id);
        return view("$this->dir.delete",["branch"=>$branch]);
    }
    public function destroy(string $id)
    {
            $branch=CourierBranch::find($id);
         $branch->delete();
        return redirect("branches");
    }
}
