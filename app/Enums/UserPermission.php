<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static BrowseUser()
 * @method static static ShowUser()
 * @method static static CreateUser()
 * @method static static UpdateUser()
 * @method static static DeleteUser()
 */
final class UserPermission extends Enum
{
    const BrowseUser       = 'browse_user';
    const ShowUser         = 'show_user';
    const CreateUser       = 'create_user';
    const UpdateUser       = 'update_user';
    const DeleteUser       = 'delete_user';
}
