<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProfileCategory;
use DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProfileCategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ProfileCategory::paginate(10);

        return response()->json($categories, 201);
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
            'name' => 'required|max:50'
        ],
        [
            'name.required' => 'Please input the Category :attribute'
        ]);

        $category = ProfileCategory::create($request->all());

        return response()->json($category, 201);
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
            $category = ProfileCategory::findOrFail($id);

        }catch(ModelNotFoundException $e){
            return response()->json([
                'message' => 'Resource Not Found'
            ], 404);
        }

        return response()->json($category, 200);
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
            $category = ProfileCategory::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return response()->json([
                'message' => 'Resource Not Found'
            ], 404);
        }

        $this->validate($request, [
            'name' => 'required|max:50'
        ],
        [
            'name.required' => 'Please input the Category :attribute'
        ]);

        // update user
        $category->name = $request->name;
        $category->save();

        return response()->json($category, 200);
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
            $category = ProfileCategory::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return response()->json([
                'message' => 'Resource not found'
                ], 404);
        }

        $category->delete();

        return response(null, 204);
    }
}
