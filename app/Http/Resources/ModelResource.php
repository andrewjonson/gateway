<?php

namespace App\Http\Resources;

use App\Http\Resources\PermissionResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ModelResource extends JsonResource
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
            'id' => hashid_encode($this->id),
            'name' => $this->name,
            'permissions' => PermissionResource::collection($this->modelPermissions)
        ];
    }
}
