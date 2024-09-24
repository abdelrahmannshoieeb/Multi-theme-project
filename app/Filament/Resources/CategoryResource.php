<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Brand;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

     protected static string $icon = 'heroicon-o-cube';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\FileUpload::make('image')
                ->image()
                ->imageEditor()
                ->required()
                ->directory('categories')
                ->columnSpanFull(),
            Section::make('Category Information')
                ->icon(static::$icon) 
                ->collapsible()
                ->schema([
                    Grid::make(2)
                        ->schema([
                            Forms\Components\TextInput::make('name')
                            ->label('Name')
                                ->required()
                                ->maxLength(255)
                                ->columnSpan(1), 
                            Forms\Components\Select::make('parent_id')
                            ->default('0')
                                ->label('Parent Category')
                                ->native(false)
                                ->options(Category::all()->pluck('fullname', 'id')->toArray())
                                ->columnSpan(1),
                        ]),
                    Forms\Components\Textarea::make('description')
                    ->required()
                        ->label('Description')
                        ->columnSpanFull(),
                    Forms\Components\Toggle::make('isActive')
                    ->default(true)
                        ->required(),
                ]),
        ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('parent.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('image'),

                Tables\Columns\IconColumn::make('isActive')
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
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListCategories::route('/'),
            //'create' => Pages\CreateCategory::route('/create'),
            //'view' => Pages\ViewCategory::route('/{record}'),
            //'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
