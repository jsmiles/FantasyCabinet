<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PoliticianProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'role' => $this->role,
            'img_url' => $this->img_url,
            'role_started' => $this->role_started,
            'role_ended' => $this->role_ended,
            'county_of_birth' => $this->county_of_birth,
            'undergraduate_university' => $this->undergraduate_university,
            'constituency' => $this->constituency,
        ];
    }
}
