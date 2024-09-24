<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CouponResource\Pages;
use App\Filament\Resources\CouponResource\RelationManagers;
use App\Models\Coupon;
use App\Models\User;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CouponResource extends Resource 
{
    protected static ?string $model = Coupon::class;

    protected static ?string $navigationIcon = 'heroicon-o-gift-top';
   
    public static function getNavigationBadge(): ?string
    {
        return Coupon::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('coupon')
                ->placeholder("Coupon Name")
                ->unique()
                ->label("Coupon")
                    ->required(),

                Forms\Components\TextInput::make('amount')
                ->label("Amount")
                ->placeholder("Amount of Coupon")
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('max_used')
                ->placeholder("Max Used Times")
                ->label("Max Use")
                    ->required()
                    ->numeric(),

                Forms\Components\Toggle::make('is_active')
                ->label("isActive")
                 ->default(1)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {

        $current_user = User::where("id",auth()->user()->id)->first();

        return $table

            ->columns([
                Tables\Columns\TextColumn::make('coupon')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('amount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('max_used')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('used_count')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                ->label("isActive")
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
                // Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Action::make("Toggle isActive")
                ->label("Toggle Active")
                ->color(Color::Red)
                ->icon("heroicon-o-check-badge")
                ->action(function($record){

                    if($record->is_active == true){

                        $record->is_active = false;
                    } else {

                        $record->is_active = true;
                    }
                    $record->save();
                   Notification::make()
                   ->title("Toggle Active Succefully")
                   ->success()
                   ->send();
                })->requiresConfirmation()
                ->visible($current_user->can("toggle_active_coupon")),
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
            'index' => Pages\ListCoupons::route('/'),
            'create' => Pages\CreateCoupon::route('/create'),
            // 'view' => Pages\ViewCoupon::route('/{record}'),
            // 'edit' => Pages\EditCoupon::route('/{record}/edit'),
        ];
    }
}
