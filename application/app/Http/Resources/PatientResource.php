<?php

namespace App\Http\Resources;

use App\Helpers\DateHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'gender' => $this->gender,
            'age' => $this->age,
            'date_of_birth' => DateHelper::convert($this->date_of_birth),
            'slug' => $this->slug,
        ];
    }
}
