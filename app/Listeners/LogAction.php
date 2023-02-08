<?php

namespace App\Listeners;

use App\Events\TakingAnActionOnTask;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogAction
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\TakingAnActionOnTask  $event
     * @return void
     */
    public function handle(TakingAnActionOnTask $event)
    {
        $task = $event->task;
        $task->statuses()->attach($task->status_id,[
            'task_id'   => $task->id,
            'assignor_id' => $task->board->owner->id,
            'assignee_id' => $task->assignee->user_id,
            'details'     => $event->details
        ]);
    }
}
