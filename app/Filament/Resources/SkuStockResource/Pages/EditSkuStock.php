<?php

namespace App\Filament\Resources\SkuStockResource\Pages;

use App\Filament\Resources\SkuStockResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSkuStock extends EditRecord
{
    protected static string $resource = SkuStockResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
