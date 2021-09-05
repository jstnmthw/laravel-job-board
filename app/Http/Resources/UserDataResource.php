<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserDataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'address' => $this->address,
            'city_id' => $this->city_id,
            'country_id' => $this->country_id,
            'create_at' => $this->created_at,
            'dob' => $this->dob,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'id' => $this->id,
            'name' => $this->name,
            'position' => $this->position,
            'province_id' => $this->province_id,
            'updated_at' => $this->updated_at,
            'zipcode' => $this->zipcode,
            'categories' => $this->categories()->get(),
        ];
    }
}
