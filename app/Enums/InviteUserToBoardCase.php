<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static AlreadyInvited()
 * @method static static UserNotActive()
 * @method static static Done()
 */
final class InviteUserToBoardCase extends Enum
{
    const AlreadyInvited = 'AlreadyInvited';
    const UserNotActive  = 'UserNotActive';
    const Done           = 'Done';
}
