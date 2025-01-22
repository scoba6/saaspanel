<?php

namespace App\Filament\Resources\ParametresIardResource\Pages;

use App\Filament\Resources\ParametresIardResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListParametresIards extends ListRecords
{
    protected static string $resource = ParametresIardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
