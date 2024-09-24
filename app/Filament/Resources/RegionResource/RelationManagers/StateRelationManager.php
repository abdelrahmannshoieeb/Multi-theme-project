<?php

namespace App\Filament\Resources\RegionResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StateRelationManager extends RelationManager
{
    protected static string $relationship = 'state';

    public function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make('State Information')
                ->collapsible()
                ->icon("heroicon-o-map-pin")
                ->schema([
                TextInput::make('name')
                ->label('State Name')
                ->placeholder('State Name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('price')
                ->label('Price')
                ->placeholder('Price')
                    ->required()
                    ->maxLength(255),
                ]) ->columns(2),
               
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
