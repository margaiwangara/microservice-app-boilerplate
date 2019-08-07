<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'surname' => $this->surname,
            'email' => $this->email,
            'profile_image' => $this->profile_image,
            'description' => $this->description,
            'address' => $this->address,
            'phone' => $this->phone,
            'website' => $this->website,
            'working_days' => $this->working_days,
            'average_review' => $this->average_review,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
            'category' => [
                'id' => $this->category->id,
                'name' => $this->category->name
            ],
            'qualifications' => $this->qualifications,
            'specialties' => $this->specialties
        ];
        
    }
}
