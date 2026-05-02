<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return response()->json(["companies"=>Company::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
             $company=new Company();         
         $company->name=$request->name;
          $company->mobile=$request->mobile;
         $company->bin=$request->bin;
         $company->email=$request->email;
         $company->website=$request->website;
         $company->city=$request->city;
         $company->area=$request->area;
         $company->street_address=$request->street_address;
         $company->post_code=$request->post_code;
         $company->inactive=$request->inactive;
         $company->logo=$request->logo;
    
         $company->save();

         return response()->json([
            'message' => 'Company saved successfully'           
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
