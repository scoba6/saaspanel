<?php

namespace App\Filament\Resources\AvenantResource\Pages;

use App\Filament\Resources\AvenantResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAvenant extends EditRecord
{
    protected static string $resource = AvenantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
