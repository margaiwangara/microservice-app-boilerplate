<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProfileQualification;
use App\Http\Resources\ProfileQualificationResource;

class ProfileQualificationController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProfileQualificationResource::collection(ProfileQualification::paginate(10));
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
            'title' => 'required|max:255',
            'description' => 'required'
        ]);

        $qualification = ProfileQualification::create($request->only(['title', 'description']));

        return new ProfileQualificationResource($qualification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ProfileQualification $qualification)
    {
        return new ProfileQualificationResource($qualification);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfileQualification $qualification)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required'
        ]);

        $qualification->update($request->only(['title', 'description']));

        return new ProfileQualificationResource($qualification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfileQualification $qualification)
    {
        $qualification->delete();

        return response()->json(null, 204);
    }
}
