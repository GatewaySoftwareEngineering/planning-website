<?php

namespace App\Models;

use App\Enums\RoleEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['assignee_id', 'board_id', 'status_id', 'title', 'description', 'image', 'due_date'];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function board()
    {
        return $this->belongsTo(Board::class);
    }

    public function currentStatus()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function assignee()
    {
        return $this->belongsTo(BoardUser::class);
    }

    public function labels()
    {
        return $this->belongsToMany(Label::class)->withTimestamps();
    }

    public function statuses()
    {
        return $this->belongsToMany(Status::class, 'activities')->withTimestamps()->withPivot('assignor_id', 'assignee_id', 'details');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    public function scopeCanBrowse(Builder $query)
    {
        switch (auth()->user()->role->name) {
            case RoleEnum::Developer:
                return $query->assignedTasks();
                break;
            case (RoleEnum::Tester):
                return $query->assignedTasks();
                break;
            case RoleEnum::ProductOwner:
                return $query->createdTasks();
                break;
            case RoleEnum::Admin:
                return $query;
                break;
            default:
                return new AuthorizationException();
                break;
        }
    }

    public function scopeAssignedTasks(Builder $query)
    {
        return $query->whereHas('assignee', function (Builder $q) {
            return $q->where('users.id', auth()->user()->id);
        });
    }

    public function scopeCreatedTasks(Builder $query)
    {
        return $query->whereHas('board', function (Builder $q) {
            return  $q->where('boards.user_id', auth()->user()->id);
        });
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
