<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AttributeResource\Pages;
use App\Filament\Resources\AttributeResource\RelationManagers;
use App\Models\Attribute;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\SelectFilter;

class AttributeResource extends Resource
{
    protected static ?string $model = Attribute::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('name')
                ->required()
                ->label('Name'),
            Forms\Components\Select::make('type')
            ->required()

                ->options([
                    'Text' => 'Text',
                    'Color' => 'Color',
                    'Number' => 'Number',
                ])
                ->required()
                ->label('Type'),
            Forms\Components\TextInput::make('suffix')
            ->required()

                ->label('Suffix'),
            Forms\Components\Toggle::make('isActive')
            ->label('Is Active'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('name')
                ->label('Name')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('type')
                ->label('Type')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('suffix')
                ->label('Suffix')
                ->sortable()
                ->searchable(),
            Tables\Columns\IconColumn::make('isActive')
            ->boolean()
            ->label('Is Active')
            ->sortable(),
        ])
        ->filters([
            SelectFilter::make('type')
                ->label('Type')
                ->options([
                    'Text' => 'Text',
                    'Color' => 'Color',
                    'Number' => 'Number',
                ]),
            // TextInputFilter::make('name')
            //     ->label('Name'),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAttributes::route('/'),
            // 'create' => Pages\CreateAttribute::route('/create'),
            // 'edit' => Pages\EditAttribute::route('/{record}/edit'),
        ];
    }
}
