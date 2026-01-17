<?php

namespace App\Http\Controllers\Courier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courier\Person;


class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $dir = "pages.courier.person";

    public function index()
    {
        $persons = Person::all();

        return view("$this->dir.index", ["persons" => $persons]);
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

        return redirect("persons");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
           $person=Person::find($id);
        return view("$this->dir.show",["person"=>$person]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
            $person=Person::find($id);
        return view("$this->dir.edit",["person"=>$person]);
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

        return redirect("persons");
    }

    /**
     * Remove the specified resource from storage.
     */
         public function delete(string $id){
        $person=Person::find($id);
        return view("$this->dir.delete",["person"=>$person]);
    }
    public function destroy(string $id)
    {
             $person=Person::find($id);
         $person->delete();
        return redirect("persons");
    }
}
