<?php

namespace App\Filament\Resources\SkuStockResource\Pages;

use App\Filament\Resources\SkuStockResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSkuStock extends ViewRecord
{
    protected static string $resource = SkuStockResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
