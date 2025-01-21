<?php

namespace App\Enums;

use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum Titre: string implements HasLabel
{
    case A = 'M.';
    case B = 'Mme';
    case C = 'Ste';

    public function getLabel(): string
    {
        return match ($this) {
            self::A => 'M.',
            self::B => 'Mme',
            self::C => 'Ste',

        };
    }
}
