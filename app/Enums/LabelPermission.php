<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static BrowseLabel()
 * @method static static ShowLabel()
 * @method static static CreateLabel()
 * @method static static UpdateLabel()
 * @method static static DeleteLabel()
 */
final class LabelPermission extends Enum
{
    const BrowseLabel       = 'browse_label';
    const ShowLabel         = 'show_label';
    const CreateLabel       = 'create_label';
    const UpdateLabel       = 'update_label';
    const DeleteLabel       = 'delete_label';
}
