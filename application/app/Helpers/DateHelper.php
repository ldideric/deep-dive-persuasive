<?php

namespace App\Helpers;
use Carbon\Carbon;

class DateHelper {

    public static function convert(string $date): string
    {
        return Carbon::parse($date)->format('d-m-Y');
    }
}