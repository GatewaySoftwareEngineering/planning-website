<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Board;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Exceptions\Api\DeleteNotAllowedException;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Status extends Model
{
    use HasFactory;

    protected $fillable=['name','initial','board_id'];

    protected static function booted()
    {
        parent::boot();
        static::deleting(function ($obj) {
            if (!$obj->canDelete()) {
                throw new DeleteNotAllowedException('Could not delete this status, it may have tasks');
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

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'activities');
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
