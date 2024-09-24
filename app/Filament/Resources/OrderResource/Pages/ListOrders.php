<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Actions;

use Filament\Resources\Components\Tab;

use Filament\Resources\Pages\ListRecords;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        // $table->enum('status', ['Pending', 'Preparing', 'In Queue', 'Ready', 'Dispatched', 'Completed', 'Canceled', 'Failed']);
        
        return [
            'All' => Tab::make('All')
                        ->modifyQueryUsing(fn($query) => $query->whereNotNull('id'))->icon("heroicon-o-queue-list"),
            'Pending' => Tab::make('Pending')
                        ->modifyQueryUsing(fn($query) => $query->where('status', "Pending"))->icon("heroicon-o-information-circle"),
            'Preparing' => Tab::make('Preparing')
                        ->modifyQueryUsing(fn($query) => $query->where('status', "Preparing"))->icon("heroicon-o-information-circle"),
            'In Queue' => Tab::make('In Queue')
                        ->modifyQueryUsing(fn($query) => $query->where('status', "In Queue"))->icon("heroicon-o-information-circle"),
            'Ready' => Tab::make('Ready')
                        ->modifyQueryUsing(fn($query) => $query->where('status', "Ready"))->icon("heroicon-o-information-circle"),
            'Dispatched' => Tab::make('Dispatched')
                        ->modifyQueryUsing(fn($query) => $query->where('status', "Dispatched"))->icon("heroicon-o-information-circle"),
            'Completed' => Tab::make('Completed')
                        ->modifyQueryUsing(fn($query) => $query->where('status', "Completed"))->icon("heroicon-o-check-circle"),
            'Canceled' => Tab::make('Canceled')
                        ->modifyQueryUsing(fn($query) => $query->where('status', "Canceled"))->icon("heroicon-o-x-circle"),
            'Failed' => Tab::make('Failed')
                        ->modifyQueryUsing(fn($query) => $query->where('status', "Failed"))->icon("heroicon-o-x-circle"),
           
        ];
    }
}
