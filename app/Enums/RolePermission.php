<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static BrowseRole()
 * @method static static ShowRole()
 * @method static static CreateRole()
 * @method static static UpdateRole()
 * @method static static DeleteRole()
 */
final class RolePermission extends Enum
{
    const BrowseRole       = 'browse_role';
    const ShowRole         = 'show_role';
    const CreateRole       = 'create_role';
    const UpdateRole       = 'update_role';
    const DeleteRole       = 'delete_role';
}
