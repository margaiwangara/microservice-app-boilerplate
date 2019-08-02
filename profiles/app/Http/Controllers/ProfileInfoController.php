<?php

namespace App\Http\Controllers;

use App\ProfileInfo;
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
        $profiles_info = ProfileInfo::paginate(10);

        return response()->json($profiles_info, 200);
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
            'address' => 'required|max:255',
            'email' => 'required|email|max:100',
            'phone' => 'required|max:15'
        ],
        [
            'address.required' => 'Please input the your :attribute',
            'address.max' => ':attribute value must not exceed :max',
            'email.required' => 'Please input your :attribute',
            'email.email' => 'Please provide an :attribute',
            'phone.required' => 'Please input your :attribute'

        ]);
        // add uuid to request
        $profiles_info = ProfileInfo::create(array_merge($request->all(), ['uuid' => (string) Uuid::generate(4)]));

        return response()->json($profiles_info, 201);
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
            $profiles_info = ProfileInfo::findOrFail($id);

        }catch(ModelNotFoundException $e){
            return response()->json([
                'message' => 'Resource Not Found'
            ], 404);
        }

        return response()->json($profiles_info, 200);
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
            $profiles_info = ProfileInfo::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return response()->json([
                'message' => 'Resource Not Found'
            ], 404);
        }

        $this->validate($request, [
            'address' => 'required|max:255',
            'email' => 'required|email|max:100',
            'phone' => 'required|max:15'
        ],
        [
            'address.required' => 'Please input the your :attribute',
            'address.max' => ':attribute value must not exceed :max',
            'email.required' => 'Please input your :attribute',
            'email.email' => 'Please provide an :attribute',
            'phone.required' => 'Please input your :attribute'

        ]);

        // update user
        $profiles_info->address = $request->address;
        $profiles_info->email = $request->email;
        $profiles_info->phone = $request->phone;
        $profiles_info->save();

        return response()->json($profiles_info, 200);
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
            $profiles_info = Profile::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return response()->json([
                'message' => 'Resource not found'
                ], 404);
        }

        $profiles_info->delete();

        return response(null, 204);
    }
}

