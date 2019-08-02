<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::paginate(10);

        return response()->json($countries, 200);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:80',
            'tag' => 'max:5'
        ],
        [
            'name.required' => 'Please input the country :attribute',
            'name.max' => 'The country :attribute length must be less than or equal to :max',
            'tag.max' => 'The country :attribute must be less than or equal to :max'
        ]);

        // add uuid to request
        $country = Country::create($request->all());

        return response()->json($country, 201);
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $country = Country::findOrFail($id);

        }catch(ModelNotFoundException $e){
            return response()->json([
                'message' => 'Resource Not Found'
            ], 404);
        }

        return response()->json($country, 200);
    }

      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $country = Country::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return response()->json([
                'message' => 'Resource Not Found'
            ], 404);
        }

        $this->validate($request, [
            'name' => 'required|max:80',
            'tag' => 'max:5'
        ],
        [
            'name.required' => 'Please input the country :attribute',
            'name.max' => 'The country :attribute length must be less than or equal to :max',
            'tag.max' => 'The country :attribute must be less than or equal to :max'
        ]);

        $country->name = $request->name;
        $country->tag = $request->tag;

        $country->save();

        return response()->json($country, 200);

    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $country = Country::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return response()->json([
                'message' => 'Resource not found'
                ], 404);
        }

        $country->delete();

        return response(null, 204);
    }
}


