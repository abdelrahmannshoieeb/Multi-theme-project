<?php

namespace App\Filament\Resources\DynamicPopUpResource\Pages;

use App\Filament\Resources\DynamicPopUpResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDynamicPopUps extends ListRecords
{
    protected static string $resource = DynamicPopUpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
