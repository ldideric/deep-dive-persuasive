<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use App\Enums\UserType;

class PatientScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        if (auth()->user()->user_type === UserType::Scientist) {
            $builder->with('user');
        } else {
            $builder->where('user_id', auth()->id());
        }
    }
}
