<?php

namespace App\Filament\Resources\AvenantResource\Pages;

use App\Filament\Resources\AvenantResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAvenants extends ListRecords
{
    protected static string $resource = AvenantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
