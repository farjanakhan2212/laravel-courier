<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $dir="pages.inventory.product";
    
    public function index()
    {
        $products=Product::all();
       return view("$this->dir.index",["products"=>$products]);
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

        $product=new Product();
        $product->barcode=$request->barcode;
        $product->name=$request->name;
        $product->offer_price=$request->offer_price;
        $product->regular_price=0;
        $product->uom_id=$request->uom_id;
        $product->product_section_id=$request->product_section_id;
        $product->product_unit_id=$request->product_unit_id;
        $product->product_category_id=$request->product_category_id;
        $product->manufacturer_id=$request->manufacturer_id;
        $product->product_type_id=$request->product_type_id;
        $product->description=$request->description;
        $product->star=1;
        $product->save();

          if($request->hasFile('photo')){
            //upload file
			$imageName=$product->id.'.'.$request->photo->extension();			
			$request->photo->move(public_path('img'),$imageName);
            //update database
            $product->photo=$imageName;
			$product->update();
		}
       

          return redirect("products");
  
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product=Product::find($id);
        return view("$this->dir.show",["product"=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    { 
         $product=Product::find($id);
        return view("$this->dir.edit",["product"=>$product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product=Product::find($id);
        $product->barcode=$request->barcode;
        $product->name=$request->name;
        $product->offer_price=$request->offer_price;
        $product->regular_price=0;
        $product->uom_id=$request->uom_id;
        $product->product_section_id=$request->product_section_id;
        $product->product_unit_id=$request->product_unit_id;
        $product->product_category_id=$request->product_category_id;
        $product->manufacturer_id=$request->manufacturer_id;
        $product->product_type_id=$request->product_type_id;
        $product->description=$request->description;
        $product->star=1;
        $product->update();

          if($request->hasFile('photo')){
            //upload file
			$imageName=$product->id.'.'.$request->photo->extension();			
			$request->photo->move(public_path('img'),$imageName);
            //update database
            $product->photo=$imageName;
			$product->update();
		}
       
       return redirect("products/$product->id/edit");
       // echo "Update:".$id;
    }

    /**
     * Remove the specified resource from storage.
     */

    public function delete(string $id){
        $product=Product::find($id);
        return view("$this->dir.delete",["product"=>$product]);
    }

    public function destroy(string $id)
    {
         $product=Product::find($id);
         $product->delete();
        return redirect("products");
      
    }
}
