<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FlashDealResource\Pages;
use App\Filament\Resources\FlashDealResource\RelationManagers;
use App\Models\FlashDeal;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use PhpParser\Node\Stmt\Label;

class FlashDealResource extends Resource
{
    protected static ?string $model = FlashDeal::class;

    protected static ?string $navigationIcon = 'heroicon-o-flag';
    public static function getNavigationBadge(): ?string
    {
        return FlashDeal::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Flash Deals')
                ->collapsible()
                ->icon("heroicon-o-shopping-cart")
                ->schema([
                    TextInput::make('title')
                    ->placeholder('Title')
                    ->label('Title')
                    ->required(),
                
                FileUpload::make('banner')
                ->placeholder('Banner')
                   ->label('Banner')
                    ->image()
                    ->directory('flash deals')
                    ->imageEditor()
                    
                    ->required(),
                
                DatePicker::make('date')
                ->placeholder('Date')
                      ->label('Date')
                    ->required(),
                
                    Select::make('products')
                    ->placeholder('Products')
                    ->native(false)
                    ->preload()
                    ->searchable()
                    ->label('Products') 
                    ->multiple()
                    ->options(Product::all()->pluck('name', 'id')->toArray()) 
                    ->required(),
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                
            Tables\Columns\TextColumn::make('title')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('banner')
            ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('date')
                ->searchable()
                ->sortable(),
            Tables\Columns\ImageColumn::make('image'),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFlashDeals::route('/'),
            'create' => Pages\CreateFlashDeal::route('/create'),
            'edit' => Pages\EditFlashDeal::route('/{record}/edit'),
        ];
    }
}
