<?php

namespace App\Traits;

trait CreatedUpdatedBy
{
    public static function bootCreatedUpdatedBy()
    {
        $user = auth()->user();
        // updating created_by and updated_by when model is created
        static::creating(function ($model) use ($user) {
            if (!$model->isDirty('created_by')) {
                $model->created_by =  $user->id;
            }
            if (!$model->isDirty('updated_by')) {
                $model->updated_by =  $user->id;
            }
        });

        // updating updated_by when model is updated
        static::updating(function ($model)  use ($user) {
            if (!$model->isDirty('updated_by')) {
                $model->updated_by =  $user->id;
            }
        });
    }
}
