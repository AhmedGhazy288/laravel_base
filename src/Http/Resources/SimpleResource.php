<?php

namespace IconTs\Base\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SimpleResource extends JsonResource
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
            'name' => implode(' - ', [
                'en' => $this->en_name,
                'ar' => $this->ar_name,
            ]),

            'names' => [
                'en' => $this->en_name,
                'ar' => $this->ar_name,
            ],
        ];
    }
}