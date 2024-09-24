<?php

namespace App\Filament\Resources\CustomerResource\Pages;

use App\Filament\Resources\CustomerResource;
use Filament\Actions;
use Filament\Tables\Filters\QueryBuilder;
use Filament\Forms\Components\Builder;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListCustomers extends ListRecords
{
    protected static string $resource = CustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }


    public function getTabs(): array
    {
        return [
            'male' => Tab::make('male')
                ->modifyQueryUsing(fn ($query) => $query->where('gender', 'Male')),
            'female' => Tab::make('female')
            ->modifyQueryUsing(fn ($query) => $query->where('gender', 'female')),
            'active' => Tab::make('active')
                ->modifyQueryUsing(fn ($query) => $query->where('status', 'active')),
            'inactive' => Tab::make('inactive')
            ->modifyQueryUsing(fn ($query) => $query->where('status', 'inactive')),
        ];
    }
}
