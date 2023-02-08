<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static BrowseBoard()
 * @method static static ShowBoard()
 * @method static static CreateBoard()
 * @method static static UpdateBoard()
 * @method static static DeleteBoard()
 * @method static static InviteToBoard()
 */
final class BoardPermission extends Enum
{
    const BrowseBoard       = 'browse_board';
    const ShowBoard         = 'show_board';
    const CreateBoard       = 'create_board';
    const UpdateBoard       = 'update_board';
    const DeleteBoard       = 'delete_board';
    const InviteToBoard     = 'invite_user_to_board';
}
