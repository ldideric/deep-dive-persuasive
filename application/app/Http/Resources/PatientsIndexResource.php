<?php

namespace App\Http\Resources;

use App\Helpers\DateHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientsIndexResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'date_of_birth' => DateHelper::convert($this->date_of_birth),
            'gender' => $this->gender,
        ];
    }
}
