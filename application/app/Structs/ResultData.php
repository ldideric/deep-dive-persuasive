<?php

namespace App\Structs;

use JsonSerializable;

final class ResultData implements jsonSerializable
{
    private function __construct(
        public ?float $proteinOne = null,
        public ?float $proteinTwo = null,
        public ?float $proteinThree = null,
        public ?float $proteinFour = null,
        public ?int $controlValue = null,
    ) {
    }

    public static function make(?float $proteinOne, ?float $proteinTwo, ?float $proteinThree, ?float $proteinFour, ?int $signalValue): self
    {
        return new self($proteinOne, $proteinTwo, $proteinThree, $proteinFour, $signalValue);
    }

    public static function createFromRequestData(array $requestData): self
    {
        return self::make($requestData['proteinOne'], $requestData['proteinTwo'], $requestData['proteinThree'], $requestData['proteinFour'], $requestData['controlValue']);
    }

    public function jsonSerialize(): array
    {
        return [
            'protein_one' => $this->proteinOne,
            'protein_two' => $this->proteinTwo,
            'protein_three' => $this->proteinThree,
            'protein_four' => $this->proteinFour,
            'control_value' => $this->controlValue,
        ];
    }
}
