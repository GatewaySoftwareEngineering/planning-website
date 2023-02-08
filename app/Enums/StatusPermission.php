<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static BrowseStatus()
 * @method static static ShowStatus()
 * @method static static CreateStatus()
 * @method static static UpdateStatus()
 * @method static static DeleteStatus()
 */
final class StatusPermission extends Enum
{
    const BrowseStatus       = 'browse_status';
    const ShowStatus         = 'show_status';
    const CreateStatus       = 'create_status';
    const UpdateStatus       = 'update_status';
    const DeleteStatus       = 'delete_status';
}
