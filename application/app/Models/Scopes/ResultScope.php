<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class ResultScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $patients = auth()->user()->patients;

        $builder->whereIn('patient_id', $patients->pluck('id'))->orderBy('created_at', 'desc');
    }
}
