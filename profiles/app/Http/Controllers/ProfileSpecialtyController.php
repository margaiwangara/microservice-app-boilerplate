<?php

namespace App\Http\Controllers;

use App\ProfileSpecialty;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;

class ProfileSpecialtyController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile_specialties = ProfileSpecialty::paginate(10);

        return response()->json($profile_specialties, 200);
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
            'title' => 'required|max:255',
            'description' => 'required|',

        ],
        [
            'title.required' => 'Please input the the :attribute',
            'title.max' => ':attribute value must not exceed :max',
            'description.required' => 'Please input the :attribute',

        ]);
        // add uuid to request
        $profile_specialty = ProfileSpecialty::create(array_merge($request->all(), ['uuid' => (string) Uuid::generate(4)]));

        return response()->json($profile_specialty, 201);
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
            $profile_specialty = ProfileSpecialty::findOrFail($id);

        }catch(ModelNotFoundException $e){
            return response()->json([
                'message' => 'Resource Not Found'
            ], 404);
        }

        return response()->json($profile_specialty, 200);
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
            $profile_specialty = ProfileSpecialty::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return response()->json([
                'message' => 'Resource Not Found'
            ], 404);
        }

        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required|',

        ],
        [
            'title.required' => 'Please input the the :attribute',
            'title.max' => ':attribute value must not exceed :max',
            'description.required' => 'Please input the :attribute',

        ]);

        // update profile qualification
        $profile_specialty->title = $request->title;
        $profile_specialty->description = $request->description;

        $profile_specialty->save();

        return response()->json($profile_specialty, 200);
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
            $profile_specialty = ProfileSpecialty::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return response()->json([
                'message' => 'Resource not found'
                ], 404);
        }

        $profile_specialty->delete();

        return response(null, 204);
    }
}

