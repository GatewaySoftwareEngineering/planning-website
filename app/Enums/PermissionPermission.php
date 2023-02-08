<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static BrowsePermission()
 * @method static static ShowPermission()
 * @method static static CreatePermission()
 * @method static static UpdatePermission()
 * @method static static DeletePermission()
 */
final class PermissionPermission extends Enum
{
    const BrowsePermission       = 'browse_permission';
    const ShowPermission         = 'show_permission';
    const CreatePermission       = 'create_permission';
    const UpdatePermission       = 'update_permission';
    const DeletePermission       = 'delete_permission';
}
