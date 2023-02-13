<?php

namespace App\Structs;

use JsonSerializable;

final class PatientAddress implements jsonSerializable
{
    private function __construct(
        public ?string $country = null,
        public ?string $postalCode = null,
        public ?string $street = null,
        public ?string $city = null,
        public ?string $houseNumber = null,
    ) {
    }

    public static function make(?string $country, ?string $postalCode, ?string $street, ?string $city, ?string $houseNumber): self
    {
        return new self($country, $postalCode, $street, $city, $houseNumber);
    }

    public function jsonSerialize(): array
    {
        return [
            'country' => $this->country,
            'postal_code' => $this->postalCode,
            'street' => $this->street,
            'city' => $this->city,
            'house_number' => $this->houseNumber,
        ];
    }
}
