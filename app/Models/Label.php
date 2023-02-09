<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Exceptions\Api\DeleteNotAllowedException;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Label extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'board_id'];

    protected static function booted()
    {
        parent::boot();
        static::deleting(function ($obj) {
            if (!$obj->canDelete()) {
                throw new DeleteNotAllowedException('Could not delete this label, it may have tasks');
            }
        });
    }

    public function canDelete()
    {
        if ($this->tasks->count())
            return false;
        return true;
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function board()
    {
        return $this->belongsTo(Board::class);
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
