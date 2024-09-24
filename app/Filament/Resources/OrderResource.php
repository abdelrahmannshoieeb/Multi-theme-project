<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function getNavigationBadge(): ?string
    {
        return Order::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('branch.name')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('customer.f_name')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('receipt_number')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('notes')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('delivery_price')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('coupon_id')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('total_price')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('discount')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('total_amount')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('payment_method')
                    ->required(),
                Forms\Components\TextInput::make('payment_status')
                    ->required(),
                Forms\Components\TextInput::make('status')
                    ->required(),
                Forms\Components\TextInput::make('claim_type')
                    ->required(),
                Forms\Components\DateTimePicker::make('claim_at'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('branch.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('customer.f_name')
                    ->numeric()
                    ->searchable(isIndividual: true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('receipt_number')
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('delivery_price')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('coupon_id')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('total_price')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('discount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_amount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('payment_method')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Cash' => 'success',
                        'Credit Card' => 'warning',
                    })
                    ->icon(fn(string $state): string => match ($state) {
                        'Cash' => 'heroicon-o-banknotes',
                        'Credit Card' => 'heroicon-o-credit-card',
                    })
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('payment_status')
                ->badge()
                ->color(fn(string $state): string => match ($state) {
                    'Pending' => 'warning',
                    'Paid' => 'success',
                    'Unpaid' => 'danger',
                    'Failed' => 'danger',
                    'Canceled' => 'danger',
                })
                ->icon(fn(string $state): string => match ($state) {
                    'Pending' => 'heroicon-o-clock',
                    'Paid' => 'heroicon-o-check-circle',
                    'Unpaid' => 'heroicon-o-x-circle',
                    'Failed' => 'heroicon-o-x-circle',
                    'Canceled' => 'heroicon-o-x-circle',
                })
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('status')
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('claim_type')
                ->badge()
                ->color(fn(string $state): string => match ($state) {
                    'Delivery' => 'success',
                    'On Branch' => 'warning',
                })
                ->icon(fn(string $state): string => match ($state) {
                    'Delivery' => 'heroicon-o-arrow-top-right-on-square',
                    'On Branch' => 'heroicon-o-shopping-bag',
                })
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('claim_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->groups(["payment_method", "payment_status","claim_type","status"])
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
