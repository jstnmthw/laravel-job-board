<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        $roles = $this->roles()->with('permissions')->get()->map(function($role) {
           return  [
               'id' => $role->id,
               'name' => $role->name,
               'guard_name' => $role->guard_name,
               'permissions' => $role->permissions->map(function($permission) {
                   return [
                       'id' => $permission->id,
                       'name' => $permission->name,
                       'guard_name' => $permission->guard_name
                   ];
               }),
           ];
        });

        return [
            'id' => $this->getKey(),
            'avatar' => $this->avatar()->exists() ? '/storage/'.$this->avatar()->first()->path : null,
            'name' => $this->name,
            'roles' => $roles,
        ];
    }
}
