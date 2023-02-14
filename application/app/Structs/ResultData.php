<?php

namespace App\Structs;

use JsonSerializable;

final class ResultData implements jsonSerializable
{
    private function __construct(
        public ?float $proteinOne = null,
        public ?float $protefloatwo = null,
        public ?float $protefloathree = null,
        public ?float $proteinFour = null,
        public ?int $signalValue = null,
    ) {
    }

    public static function make(?float $proteinOne, ?float $protefloatwo, ?float $protefloathree, ?float $proteinFour, ?int $signalValue): self
    {
        return new self($proteinOne, $protefloatwo, $protefloathree, $proteinFour, $signalValue);
    }

    public function jsonSerialize(): array
    {
        return [
            'protein_one' => $this->proteinOne,
            'protein_two' => $this->protefloatwo,
            'protein_three' => $this->protefloathree,
            'protein_four' => $this->proteinFour,
            'signal_value' => $this->signalValue,
        ];
    }
}
