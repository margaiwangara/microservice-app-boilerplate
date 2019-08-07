<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProfileCategory;
use App\Http\Resources\ProfileCategoryResource;

class ProfileCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProfileCategoryResource::collection(ProfileCategory::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100'
        ],
        [
            'name.required' => 'category :attribute is required'
        ]);

        $category = ProfileCategory::create([
            'name' => $request->name
        ]);

        return new ProfileCategoryResource($category);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ProfileCategory $category)
    {
        return new ProfileCategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfileCategory $category)
    {
        $request->validate([
            'name' => 'required|max:100'
        ],
        [
            'name.required' => 'category :attribute is required'
        ]);

        $category->update($request->only(['name']));

        return new ProfileCategoryResource($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfileCategory $category)
    {
        $category->delete();

        return response()->json(null, 204);
    }
}
