<?php

namespace App\Filament\Resources\CompagnieResource\Pages;

use App\Filament\Resources\CompagnieResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCompagnies extends ListRecords
{
    protected static string $resource = CompagnieResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
