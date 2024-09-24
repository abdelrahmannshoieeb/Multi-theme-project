<?php

namespace App\Filament\Resources\CustomAlertResource\Pages;

use App\Filament\Resources\CustomAlertResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCustomAlerts extends ListRecords
{
    protected static string $resource = CustomAlertResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
