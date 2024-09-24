<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BranchResource\Pages;
use App\Filament\Resources\BranchResource\RelationManagers;
use App\Models\Branch;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BranchResource extends Resource
{
    protected static ?string $model = Branch::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    public static function form(Form $form): Form
    {
        return $form
        
            ->schema([
                Section::make('Informations')
                ->schema([
                    Forms\Components\TextInput::make('code')
                    ->placeholder("Code")
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->placeholder("Name")
                        ->maxLength(255),
                    Forms\Components\TextInput::make('address')
                    ->placeholder("Addres")
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('phone')
                    ->placeholder("Phone")
                        ->tel()
                        ->required()
                        ->maxLength(255),
                ])->columns(2)
                ->collapsible()
                ->icon('heroicon-o-building-office'),
                Section::make('Image')
                ->schema([
                    Forms\Components\FileUpload::make('image')
                    ->columnSpanFull()
                    ->imageEditor()
                    ->required()
                    ->image()
                    ->directory("branches"),
                Forms\Components\Toggle::make('status')
                    ->default(true)
                    ->required(),
                ])->columns(2)
                ->collapsible()
                ->icon('heroicon-o-building-office'),


               
             
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\IconColumn::make('status')
                ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListBranches::route('/'),
            // 'create' => Pages\CreateBranch::route('/create'),
            // 'edit' => Pages\EditBranch::route('/{record}/edit'),
        ];
    }
}
