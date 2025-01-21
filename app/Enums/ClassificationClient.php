<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ClassificationClient: string implements HasLabel
{
    case A = 'CLIENTS';
    case B = 'CLIENTS - GROUPE';
    case C = 'CLIENTS ETAT ET COLLECTIVITES PUBLIQUES';
    case D = 'CLIENTS, ORGANISMES INTERNATIONAUX';

    public function getLabel(): string
    {
        return match ($this) {
            self::A => 'CLIENTS',
            self::B => 'CLIENTS - GROUPE',
            self::C => 'CLIENTS ETAT ET COLLECTIVITES PUBLIQUES',
            self::D => 'CLIENTS, ORGANISMES INTERNATIONAUX',

        };
    }

}
