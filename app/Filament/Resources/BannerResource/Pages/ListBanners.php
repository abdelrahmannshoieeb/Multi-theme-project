<?php

namespace App\Filament\Resources\BannerResource\Pages;
use App\Filament\Resources\BannerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use Filament\Tables\Filters\QueryBuilder;
use Filament\Forms\Components\Builder;
use Filament\Resources\Components\Tab;

use function Symfony\Component\String\b;

class ListBanners extends ListRecords
{
    protected static string $resource = BannerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }



    public function getTabs(): array
    {
        return [
            'active' => Tab::make('Active')
                ->modifyQueryUsing(fn ($query) => $query->where('isActive', 1)),
            'not active' => Tab::make('not Active')
            ->modifyQueryUsing(fn ($query) => $query->where('isActive', 0)),
            's Home' => Tab::make('Insss home')
            ->modifyQueryUsing(fn ($query) => $query->where('isHome', 1)),
            'Not in Home' => Tab::make('Not In home')
            ->modifyQueryUsing(fn ($query) => $query->where('isHome', 0)),
        ];
    }
}
