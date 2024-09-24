<?php

namespace App\Filament\Resources\DynamicPopUpResource\Pages;

use App\Filament\Resources\DynamicPopUpResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDynamicPopUp extends EditRecord
{
    protected static string $resource = DynamicPopUpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
