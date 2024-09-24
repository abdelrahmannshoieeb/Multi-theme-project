<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomAlertResource\Pages;
use App\Filament\Resources\CustomAlertResource\RelationManagers;
use App\Models\CustomAlert;
use Filament\Forms;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomAlertResource extends Resource
{
    protected static ?string $model = CustomAlert::class;

    protected static ?string $navigationIcon = 'heroicon-o-bell-alert';

    public static function getNavigationBadge(): ?string
    {
        return CustomAlert::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
               
                    Section::make('Text Settings')
                    ->collapsible()
                    ->icon("heroicon-o-squares-2x2")
                    ->schema([
                        TextInput::make('link')

                        ->placeholder('Link')
                        
                            ->url()
                            ->required()
                            ->columnSpan(1)
                            ->label('Link'),
                        
                        Textarea::make('text')
                        
                            ->required()
                            ->placeholder('Text')
                            ->columnSpan(1)
                            ->label('Text'),

                            FileUpload::make('image')
               
                            ->required()
                            ->directory('Alerts')
                            ->image()
                            ->imageEditor()
                            ->columnSpan(2)
                            ->label('Image'),
                        
                       
                        ])->columnSpan(1),

                        Section::make('Alert')
                        ->collapsible()
                        ->icon("heroicon-o-bell-alert")
                        ->schema([
                            ToggleButtons::make('alert_size')
                                    ->options([
                                        'Small' => 'Small',
                                        'Large' => 'Large',
                                    ])
                                    ->icons([
                                        'Small' => 'heroicon-o-bars-2',
                                        'Large' => 'heroicon-o-bars-3',
                                    ])
                                    ->colors([
                                        'Small' => 'success',
                                        'Large' => 'success',
                                        
                                    ])
                                    ->required()
                                    ->columnSpanFull(),
                                    ColorPicker::make('background_color')
                                
                                    ->required()
                                    ->label('Background Color'),
                                
                                ColorPicker::make('text_color')
                        
                                    ->required()
                                    ->label('Text Color'),
                            ])->columns(2)
                              ->columnSpan(1),                    
               
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

            Tables\Columns\TextColumn::make('link')
            ->searchable()
            ->sortable(),
            Tables\Columns\TextColumn::make('text')
            ->searchable()
                ->sortable(),
                Tables\Columns\TextColumn::make('alert_size')
                ->searchable()
                ->sortable(),
            Tables\Columns\ImageColumn::make('image'),
            Tables\Columns\TextColumn::make('background_color')
            ->searchable()
            ->formatStateUsing(fn ($state) => "<span style='display: inline-block; width: 24px; height: 24px; background-color: $state; border-radius: 50%;'></span>")
            ->html(),

            Tables\Columns\TextColumn::make('text_color')
            ->searchable()
            ->formatStateUsing(fn ($state) => "<span style='display: inline-block; width: 24px; height: 24px; background-color: $state; border-radius: 50%;'></span>")
            ->html(),
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
            'index' => Pages\ListCustomAlerts::route('/'),
            'create' => Pages\CreateCustomAlert::route('/create'),
            'edit' => Pages\EditCustomAlert::route('/{record}/edit'),
        ];
    }
}
