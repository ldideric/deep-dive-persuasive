<?php

namespace App\Structs;

use JsonSerializable;

final class ResultData implements jsonSerializable
{
    private function __construct(
        public ?int $proteinOne = null,
        public ?int $proteinTwo = null,
        public ?int $proteinThree = null,
        public ?int $proteinFour = null,
        public ?int $signalValue = null,
    ) {
    }

    public static function make(?int $proteinOne, ?int $proteinTwo, ?int $proteinThree, ?int $proteinFour, ?int $signalValue): self
    {
        return new self($proteinOne, $proteinTwo, $proteinThree, $proteinFour, $signalValue);
    }

    public function jsonSerialize(): array
    {
        return [
            'protein_one' => $this->proteinOne,
            'protein_two' => $this->proteinTwo,
            'protein_three' => $this->proteinThree,
            'protein_four' => $this->proteinFour,
            'signal_value' => $this->signalValue,
        ];
    }
}
