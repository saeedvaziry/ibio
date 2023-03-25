<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class Device extends Enum
{
    const DESKTOP = 'desktop';

    const PHONE = 'phone';

    const TABLET = 'tablet';

    const ROBOT = 'robot';

    const OTHER = 'other';
}
