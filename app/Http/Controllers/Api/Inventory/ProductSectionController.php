<?php

namespace App\Http\Controllers\Api\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory\ProductSection;
use Illuminate\Support\Facades\DB;

class ProductSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $sections=ProductSection::all();
        return json_encode(["sections"=>$sections]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

      public function filter(string $id)
    {
        $sections=DB::table("product_sections")->where("unit_id",$id)->get();
        return json_encode(["sections"=>$sections]);
    }
    /**
     * Update the specified resource in storage.
     */
    
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
