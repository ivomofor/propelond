<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class LostDocumentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'surname' => $this->surname,
            'given_name' => $this->given_name,
            'dob' => $this->dob,
            'profession' => $this->profession,
            'unique_identification_number' => $this->unique_identification_number,
            'place_of_pick' => $this->place_of_pick,
            'phone_number' => $this->phone_number,
            'country' => $this->country,
            'city' => $this->city,
            'image_path' => $this->image_path,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
            'user' => User::find($this->user_id)
          ];
    }
}
