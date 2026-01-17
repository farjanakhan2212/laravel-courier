<?php

namespace App\Http\Controllers\Api\Courier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courier\Person;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $persons=Person::all();
          return response()->json(["person"=>Person::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $person = new Person();
        $person->name = $request->name;
        $person->position_id = $request->position_id;
        $person->sex = $request->sex;
        $person->dob = $request->dob;
        $person->doj = $request->doj;
        $person->mobile = $request->mobile;
        $person->address = $request->address;
        $person->inactive = $request->inactive;

        $person->save();

        return response()->json([
            'message' => 'Person saved successfully'           
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         return response()->json(Person::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
           $person=Person::find($id);
        
        $person->name = $request->name;
        $person->position_id = $request->position_id;
        $person->sex = $request->sex;
        $person->dob = $request->dob;
        $person->doj = $request->doj;
        $person->mobile = $request->mobile;
        $person->address = $request->address;
        $person->inactive = $request->inactive;

        $person->update();

         return response()->json([
            'message' => "Successfully updated"          
        ]);
    

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         Person::find($id)->delete();
       return json_encode(["message"=>"Successfully Deleted"]);
    }
}
