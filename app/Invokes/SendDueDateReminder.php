<?php

namespace App\Invokes;

use Carbon\Carbon;
use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SendDueDateReminderNotification;

class SendDueDateReminder
{
    public function __invoke()
    {
        $tasks = Task::where('due_date', Carbon::today())->whereHas('currentTask', function (Builder $query) {
            return $query->where('name', '!=', 'done');
        });
        foreach ($tasks as $task) {
            Notification::send([$task->assignee], new SendDueDateReminderNotification($task));
        }
    }
}
