<?php

namespace App\Models;

use App\Enums\RoleEnum;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Exceptions\Api\DeleteNotAllowedException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Board extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'user_id'];

    protected static function booted()
    {
        parent::boot();
        static::deleting(function ($obj) {
            if (!$obj->canDelete()) {
                throw new DeleteNotAllowedException('Could not delete this board, it may have tasks');
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

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps()->withPivot('id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function labels()
    {
        return $this->hasMany(Label::class);
    }

    public function statuses()
    {
        return $this->hasMany(Status::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    public function scopeCanBrowse(Builder $query)
    {
        switch (auth()->user()->role->name) {
            case RoleEnum::Developer || RoleEnum::Tester:
                return $query->whereHas('users', function (Builder $q) {
                    return $q->where('users.id', auth()->user()->id);
                });
                break;
            case RoleEnum::ProductOwner:
                return $query->where('user_id', auth()->user()->id);
                break;
            case RoleEnum::Admin:
                return $query;
                break;
            default:
                return new AuthorizationException();
                break;
        }
    }

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
