<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Models\Customer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\ActionGroup;
use Filament\Forms\Components\Section;

use Filament\Tables\Actions\Action;



class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('User Information')
                    ->schema([
                        Forms\Components\TextInput::make('f_name')

                            ->label('First Name')
                            ->placeholder('First Name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('l_name')

                            ->label('Last Name')
                            ->placeholder('Last Name')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('phone')

                            ->label('Phone')
                            ->placeholder('Phone')



                            ->tel()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('gender')
                            ->options([
                                'Male' => 'Male',
                                'Female' => 'Female'
                            ])
                            ->required(),

                        Forms\Components\TextInput::make('email')

                            ->label('Email')
                            ->placeholder('Email')

                            ->email()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('password')

                            ->label('Password')
                            ->placeholder('Password')

                            ->password()
                            ->required()
                            ->maxLength(255),
                    ])->columns(2)
                    ->icon('heroicon-o-user-circle')
                    ->collapsible()
                    ->aside(),


                Section::make('Additional Information')
                    ->schema([

                        Forms\Components\TextInput::make('wallet')
                            ->required()
                            ->numeric()
                            ->default(0.00),
                        Forms\Components\TextInput::make('points')
                            ->required()
                            ->numeric()
                            ->default(0),
                        Forms\Components\Toggle::make('status')
                            ->label('Status')
                            ->onColor('success')
                            ->offColor('danger')
                            ->onIcon('heroicon-o-check-circle')
                            ->offIcon('heroicon-o-x-circle')
                            ->default(true)
                            ->required(),
                    ])
                    ->icon('heroicon-o-user-circle')
                    ->collapsible()
                    ->columns(3)
                    ->aside(),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('f_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('l_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('gender'),
                Tables\Columns\TextColumn::make('wallet')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('points')
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
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),


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
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
