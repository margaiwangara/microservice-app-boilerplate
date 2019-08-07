<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProfileSpecialty;
use App\Http\Resources\ProfileSpecialtyResource;

class ProfileSpecialtyController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProfileSpecialtyResource::collection(ProfileSpecialty::paginate(10));
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

        $qualification = ProfileSpecialty::create($request->only(['title', 'description']));

        return new ProfileSpecialtyResource($qualification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ProfileSpecialty $qualification)
    {
        return new ProfileSpecialtyResource($qualification);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfileSpecialty $qualification)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required'
        ]);

        $qualification->update($request->only(['title', 'description']));

        return new ProfileSpecialtyResource($qualification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfileSpecialty $qualification)
    {
        $qualification->delete();

        return response()->json(null, 204);
    }
}
