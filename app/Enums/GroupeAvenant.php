<?php

namespace App\Enums;

use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum GroupeAvenant: string implements HasLabel
{
    case A = 'FIXE';
    case B = 'CHANGEMENT';
    case C = 'SUSPENSION';
    case D = 'AUTRE';

    public function getLabel(): string
    {
        return match ($this) {
            self::A => 'FIXE',
            self::B => 'CHANGEMENT',
            self::C => 'SUSPENSION',
            self::D => 'AUTRE',

        };
    }
}
