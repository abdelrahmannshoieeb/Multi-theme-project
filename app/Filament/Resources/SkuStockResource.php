<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SkuStockResource\Pages;
use App\Filament\Resources\SkuStockResource\RelationManagers;
use App\Models\SkuStock;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SkuStockResource extends Resource
{
    protected static ?string $model = SkuStock::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox-stack';

    public static function getNavigationBadge(): ?string
    {
        return SkuStock::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                TextInput::make('count')
                    ->label('Stock Count')
                    ->placeholder("Count")
                    ->required()
                    ->minValue(0),
                TextInput::make('warning')
                    ->placeholder("Warning")
                    ->label('warning')
                    ->required()
                    ->minValue(0),
                ToggleButtons::make('type')
                    ->options([
                        'Unlimited' => 'Unlimited',
                        'Base On Stock' => 'Base On Stock',
                        'Unavailable' => 'Unavailable'
                    ])
                    ->icons([
                        'Unlimited' => 'heroicon-o-check',
                        'Base On Stock' => 'heroicon-o-x-mark',
                        'Unavailable' => 'heroicon-o-clock',
                    ])
                    ->colors([
                        'Unlimited' => 'success',
                        'Base On Stock' => 'danger',
                        'Unavailable' => 'warning',
                    ])
                    ->default('in stock')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product.name')
                    ->searchable(isIndividual: true)

                    ->sortable(),
                Tables\Columns\TextColumn::make('skuCode.code')
                    ->searchable(isIndividual: true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('branch.name')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('type')
                    ->badge()

                    ->icon(fn($state) => match ($state) {

                        'Unlimited' => 'heroicon-o-check',
                        'Base On Stock' => 'heroicon-o-x-mark',
                        'Unavailable' => 'heroicon-o-clock',
                    })
                    ->color(fn($state) => match ($state) {

                        'Unlimited' => 'success',
                        'Base On Stock' => 'danger',
                        'Unavailable' => 'warning',
                    }),
                Tables\Columns\TextColumn::make('count')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('warning')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->recordUrl(null)
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListSkuStocks::route('/'),
            'create' => Pages\CreateSkuStock::route('/create'),
            'view' => Pages\ViewSkuStock::route('/{record}'),
            // 'edit' => Pages\EditSkuStock::route('/{record}/edit'),
        ];
    }
}
