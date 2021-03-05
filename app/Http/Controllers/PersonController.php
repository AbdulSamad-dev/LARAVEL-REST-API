<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Models\Person;
use Illuminate\Http\Request;
use App\Http\Resources\PersonCollection;
use App\Http\Resources\PersonResource;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PersonResource::collection(Person::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $person =   $request->isMethod('put') ? Person::findOrFail($request->id):new Person;

      $person->id = $request->id;
      $person->name = $request->name;
      $person->email = $request->email;
      $person->image = base64_encode($request->image);
      if($person->save())
      {
          return new PersonResource($person);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return new PersonResource(Person::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $person =  Person::findOrFail($id);

        if($person->delete())
        {
           return new PersonResource($person);
        }
    }
}
