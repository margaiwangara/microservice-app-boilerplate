<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;

class ProfileController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::paginate(10);

        return response()->json($profiles, 200);
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
            'name' => 'required|max:100',
            'surname' => 'required|max:100',
            'profile_image' => 'required|max:255',
            'description' => 'required',
            'website' => 'url'
        ],
        [
            'name.required' => 'Please input the your :attribute',
            'surname.required' => 'Please input your surname',

        ]);
        // add uuid to request
        $profile = Profile::create(array_merge($request->all(), ['uuid' => (string) Uuid::generate(4)]));

        return response()->json($profile, 201);
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
            $profile = Profile::findOrFail($id);

        }catch(ModelNotFoundException $e){
            return response()->json([
                'message' => 'Resource Not Found'
            ], 404);
        }

        return response()->json($profile, 200);
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
            $profile = Profile::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return response()->json([
                'message' => 'Resource Not Found'
            ], 404);
        }

        $this->validate($request, [
            'name' => 'required|max:100',
            'surname' => 'required|max:100',
            'profile_image' => 'required|max:255',
            'description' => 'required',
            'website' => 'url'
        ],
        [
            'name.required' => 'Please input the your :attribute',
            'surname.required' => 'Please input your :attribute',

        ]);

        // update user
        $profile->name = $request->name;
        $profile->surname = $request->surname;
        $profile->profile_image = $request->profile_image;
        $profile->description = $request->description;
        $profile->website = $request->website;
        $profile->working_days = $request->working_days;

        $profile->save();

        return response()->json($profile, 200);
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
            $profile = Profile::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return response()->json([
                'message' => 'Resource not found'
                ], 404);
        }

        $profile->delete();

        return response(null, 204);
    }
}

