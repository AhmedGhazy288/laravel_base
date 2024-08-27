<?php

namespace IconTs\Base\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Dashboard\PermissionDashboardResource;

class UserDashboardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,

            'type' => User::TYPES_NAMES[$this->type],

            'photoUrl' => $this->photoUrl,

            'name' => [
                'first' => $this->first_name,
                'last' => $this->last_name,
            ],

            'full_name' => implode(" ", [
                $this->first_name,
                $this->last_name,
            ]),

            'username' => $this->username,

            'phones' => [
                '1' => $this->phone1
            ],

            //ROLES
            //FOR COMPATIBILITY
            'permissions' => PermissionDashboardResource::collection($this->roles),
            'permissions_names' => $this->roles->pluck('name'),

            'created_at' => $this->created_at,
        ];
    }
}