<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Admin()
 * @method static static ProductOwner()
 * @method static static Developer()
 * @method static static Tester()
 */
final class RoleEnum extends Enum
{
    const Admin         = 'admin';
    const ProductOwner  = 'product_owner';
    const Developer     = 'developer';
    const Tester        = 'tester';
}
