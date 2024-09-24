<?php

namespace App\Filament\Resources\SkuStockResource\Pages;

use App\Filament\Resources\SkuStockResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSkuStocks extends ListRecords
{
    protected static string $resource = SkuStockResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
