<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProfileCategory;
use DB;

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
        $category = ProfileCategory::find($id);

        if(is_null($category)){
            return response()->json([
                'errors' => [
                    'message' => 'Resource Not Found'
                ]
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
        $category = ProfileCategory::find($id);
        if(is_null($category)){
            return response()->json([
                'errors' => [
                    'message' => 'Resource Not Found'
                ]
            ], 404);
        }

        $this->validate($request, [
            'name' => 'required|max:50'
        ],
        [
            'name.required' => 'Please input the Category :attribute'
        ]);

        // update user
        $updatedCategory = DB::collection('profile_categories')
                                ->where('_id', $id)->update($request->all(), ['upsert' => true]);

        return response()->json($updatedCategory, 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // check if exists
        $category = ProfileCategory::find($id);

        if(is_null($category)){
            return response()->json([
                'errors' => [
                    'message' => 'Resource not found'
                ]
                ], 404);
        }

        $category->delete();

        return response(null, 204);
    }
}
