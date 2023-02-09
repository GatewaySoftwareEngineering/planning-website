<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static BrowseTask()
 * @method static static ShowTask()
 * @method static static CreateTask()
 * @method static static UpdateTask()
 * @method static static DeleteTask()
 * @method static static AssignTask()
 * @method static static MoveTask()
 */
final class TaskPermission extends Enum
{
    const BrowseTask       = 'browse_task';
    const ShowTask         = 'show_task';
    const CreateTask       = 'create_task';
    const UpdateTask       = 'update_task';
    const DeleteTask       = 'delete_task';
    const AssignTask       = 'assign_task';
    const MoveTask         = 'move_task';
    const ViewLogTask      = 'view_log_task';
}
