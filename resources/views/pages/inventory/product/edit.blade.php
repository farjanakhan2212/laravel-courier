<?php
 use App\Models\Inventory\ProductType;
 use App\Models\Inventory\ProductCategory;
 use App\Models\Inventory\ProductSection;
 use App\Models\Inventory\ProductUnit;
 use App\Models\Inventory\Uom;
 use App\Models\Inventory\Manufacturer;

 $units=ProductUnit::all();
 $sections=ProductSection::all();
 $categories=ProductCategory::all();
 $types=ProductType::all();
 $uoms=Uom::all();
 $mfgs=Manufacturer::all();

?>

@extends("layouts.master")
@section("page")

<div class="card">
    <div class="card-header">
       <div class="row flex-between-center">
                <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                  <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Edit Product</h5>
                </div>
                <div class="col-8 col-sm-auto ms-auto text-end ps-0">
                 
                  <div id="orders-actions">
                    <a href="{{url('products')}}" class="btn btn-falcon-default btn-sm" type="button"><svg class="svg-inline--fa fa-plus fa-w-14" data-fa-transform="shrink-3 down-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="" style="transform-origin: 0.4375em 0.625em;"><g transform="translate(224 256)"><g transform="translate(0, 64)  scale(0.8125, 0.8125)  rotate(0 0 0)"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" transform="translate(-224 -256)"></path></g></g></svg><!-- <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span> Font Awesome fontawesome.com --><span class="d-none d-sm-inline-block ms-1">Back</span></a>
                   
                    <a href="#" class="btn btn-falcon-default btn-sm" type="button"><svg class="svg-inline--fa fa-external-link-alt fa-w-16" data-fa-transform="shrink-3 down-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="external-link-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.625em;"><g transform="translate(256 256)"><g transform="translate(0, 64)  scale(0.8125, 0.8125)  rotate(0 0 0)"><path fill="currentColor" d="M432,320H400a16,16,0,0,0-16,16V448H64V128H208a16,16,0,0,0,16-16V80a16,16,0,0,0-16-16H48A48,48,0,0,0,0,112V464a48,48,0,0,0,48,48H400a48,48,0,0,0,48-48V336A16,16,0,0,0,432,320ZM488,0h-128c-21.37,0-32.05,25.91-17,41l35.73,35.73L135,320.37a24,24,0,0,0,0,34L157.67,377a24,24,0,0,0,34,0L435.28,133.32,471,169c15,15,41,4.5,41-17V24A24,24,0,0,0,488,0Z" transform="translate(-256 -256)"></path></g></g></svg><!-- <span class="fas fa-external-link-alt" data-fa-transform="shrink-3 down-2"></span> Font Awesome fontawesome.com --><span class="d-none d-sm-inline-block ms-1">Export</span></a>
                  </div>
                </div>
              </div>
   </div>
   <div class="card-body">

    <form action="{{url('products/'.$product->id)}}" method="post" enctype="multipart/form-data">
      @csrf
      @method("PUT")
  
 <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="product_type_id">Type</label>
                <div class="col-sm-10">
                  <select class="form-select" id="name" name="product_type_id">                      
                      @foreach($types as $type)                         
                         @if($product->product_type_id==$type->id)
                            <option value="{{$type->id}}" selected>{{$type->name}}</option>
                         @else                        
                            <option value="{{$type->id}}">{{$type->name}}</option>
                        @endif
                      @endforeach
                  </select>
                </div>
          </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="product_unit_id">Unit</label>
                <div class="col-sm-10">
                  <select onchange="loadSection()" class="form-select" id="product_unit_id" name="product_unit_id">                      
                      @foreach($units as $unit)
                        @if($product->unit_id==$unit->id)
                          <option value="{{$unit->id}}" selected>{{$unit->name}}</option>
                        @else
                         <option value="{{$unit->id}}">{{$unit->name}}</option>
                        @endif
                       
                      @endforeach
                  </select>
                </div>
          </div>
        

          <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="product_section_id">Section</label>
                <div class="col-sm-10">
                  <select onchange="loadCategory()" class="form-select" id="product_section_id" name="product_section_id">                      
                         @foreach($sections as $section)
                             @if($product->product_section_id==$section->id)
                             <option value="{{$section->id}}" selected>{{$section->name}}</option>
                             @else
                              <option value="{{$section->id}}">{{$section->name}}</option>
                             @endif

                          @endforeach
                  </select>
                </div>
          </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="name">Category</label>
                <div class="col-sm-10">
                  <select class="form-select" id="product_category_id" name="product_category_id">
                      @foreach($categories as $category)
                             @if($product->product_category_id==$category->id)
                             <option value="{{$category->id}}" selected>{{$category->name}}</option>
                             @else
                              <option value="{{$category->id}}">{{$category->name}}</option>
                             @endif

                          @endforeach
                  </select>
                </div>
        </div>

           <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="barcode">Barcode</label>
                <div class="col-sm-10">
                  <input class="form-control" id="barcode" name="barcode" type="text" value="{{$product->barcode}}">
                </div>
          </div>



           <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="name">Name</label>
                <div class="col-sm-10">
                  <input class="form-control" id="name" name="name" type="text" value="{{$product->name}}">
                </div>
          </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="uom_id">Uom</label>
                <div class="col-sm-10">
                  <select class="form-select" name="uom_id" id="uom_id">
                    @foreach($uoms as $uom)
                        <option value="{{$uom->id}}">{{$uom->name}}</option>

                         @if($product->uom_id==$uom->id)
                             <option value="{{$uom->id}}" selected>{{$uom->name}}</option>
                         @else
                              <option value="{{$uom->id}}">{{$uom->name}}</option>
                         @endif

                    @endforeach
                  </select>
                </div>
          </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="manufacturer_id">Mfg</label>
                <div class="col-sm-10">
                  <select class="form-select" name="manufacturer_id" id="manufacturer_id">
                    @foreach($mfgs as $mfg)
                        <option value="{{$mfg->id}}">{{$mfg->name}}</option>
                          @if($product->manufacturer_id==$mfg->id)
                             <option value="{{$mfg->id}}" selected>{{$mfg->name}}</option>
                         @else
                              <option value="{{$mfg->id}}">{{$mfg->name}}</option>
                         @endif
                    @endforeach
                  </select>
                </div>
          </div>
             <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="offer_price">Price</label>
                <div class="col-sm-10">
                  <input class="form-control" id="offer_price" name="offer_price" type="text" value="{{$product->offer_price}}">
                </div>
            </div>
             <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="photo">Photo</label>
                <div class="col-sm-10">
                  <input class="form-control" id="photo" name="photo" type="file">
                  <br>
                  <img src="{{asset('img/'.$product->photo)}}" style="max-width:300px;object-fit:cover" />
                </div>
            </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="description">Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="description" name="description">{{$product->description}}</textarea>
                </div>
          </div>
     
      <input class="btn btn-primary" type="submit" value="Save Change" />
    </form>

  

       
       
     </div>
  </div>

<script>
 
 var base_url="http://127.0.0.1:8000/api";

 async function loadSection(){   
  
    let id=document.querySelector("#product_unit_id").value;    
    let endpoint=`productsections/${id}/filter`;
    let url=`${base_url}/${endpoint}`;

    try {   
      const response =  await fetch(url,{
          method: "GET",
          headers: {
              "Accept":"application/json",         
          }      
      });

      let json=await response.json();  

      let sections=json.sections;
      //console.log(sections);

      let html="";      
      sections.forEach((section,i)=>{
        html+=`<option value="${section.id}">${section.name}</option>`;
      });

      document.querySelector("#product_section_id").innerHTML=html;
    
   } catch (error) {
      console.error("Error:", error);
   }


 }


      async function loadCategory(){

     let id=document.querySelector("#product_section_id").value;
     let endpoint=`productcategories/${id}/filter`;
     let url=`${base_url}/${endpoint}`;

        try {   
          
          const response =  await fetch(url,{
            method: "GET",
            headers: {
                "Accept":"application/json",         
            }      
          });

        let json=await response.json();  

        let categories=json.categories;
        //console.log(sections);


        let html=categories.map((category)=>{
          return `<option value="${category.id}">${category.name}</option>`;
        });

      document.querySelector("#product_category_id").innerHTML=html;
    
   } catch (error) {
      console.error("Error:", error);
   }

    }


</script>

@endsection