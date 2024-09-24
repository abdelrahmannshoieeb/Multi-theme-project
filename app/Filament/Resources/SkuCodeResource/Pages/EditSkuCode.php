<?php

namespace App\Filament\Resources\SkuCodeResource\Pages;

use App\Filament\Resources\SkuCodeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSkuCode extends EditRecord
{
    protected static string $resource = SkuCodeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
