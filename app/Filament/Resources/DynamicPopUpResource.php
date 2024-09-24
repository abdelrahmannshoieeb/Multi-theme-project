<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DynamicPopUpResource\Pages;
use App\Filament\Resources\DynamicPopUpResource\RelationManagers;
use App\Models\DynamicPopUp;
use Filament\Forms;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Tables\Actions\Action;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DynamicPopUpResource extends Resource
{
    protected static ?string $model = DynamicPopUp::class;

    protected static ?string $navigationIcon = 'heroicon-o-computer-desktop';

    public static function getNavigationBadge(): ?string
    {
        return DynamicPopUp::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informations')
                ->collapsible()
                ->icon("heroicon-o-shopping-cart")
                ->schema([
                    TextInput::make('title')
                  
                    ->placeholder('Title')
                    ->required()
                    ->label('Title'),
                
                Textarea::make('summary')
             
                ->placeholder('Summary')
                    ->required()
                    ->label('Summary'),
                
                FileUpload::make('image')
                
                ->placeholder('Image')
                ->directory('dynamic_popups')
                    ->image()
                    ->imageEditor()
                    ->required()
                    ->label('Image'),
                
              
                TextInput::make('link')
                    ->placeholder('Link')
                    ->url()
                    ->required()
                    ->label('Link'),

                ])->columns(2)
                ->columnSpan(1),

                Section::make('Buttons')
                ->collapsible()
                ->icon("heroicon-o-shopping-cart")
                ->schema([
                    TextInput::make('button_text')
               
                    ->placeholder('Button Text')
                        ->required()
                        ->label('Button Text'),
                    
                    ColorPicker::make('button_color')
                   
                         ->placeholder('Button Color')
                        ->required()
                        ->label('Button Color'),
                    
                
                    
                ])
                ->columns(3)
                ->columnSpan(1),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            Tables\Columns\TextColumn::make('title')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('summary')
            ->searchable()
                ->sortable(),
             
            Tables\Columns\ImageColumn::make('image'),
            Tables\Columns\TextColumn::make('button_text')
            ->searchable()
            ->sortable(),

            Tables\Columns\TextColumn::make('button_color')
            ->searchable()
            ->formatStateUsing(fn ($state) => "<span style='display: inline-block; width: 24px; height: 24px; background-color: $state; border-radius: 50%;'></span>")
            ->html(),

            Tables\Columns\TextColumn::make('button_text_color')
            ->searchable()
            ->formatStateUsing(fn ($state) => "<span style='display: inline-block; width: 24px; height: 24px; background-color: $state; border-radius: 50%;'></span>")
            ->html(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make('Link'),
                Action::make('link')
                ->label('link')
                ->url(fn ($record) => "{$record->link}")
                ->icon('heroicon-o-paper-airplane')
                ->color('red')
                ->openUrlInNewTab(),
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
            'index' => Pages\ListDynamicPopUps::route('/'),
            'create' => Pages\CreateDynamicPopUp::route('/create'),
            'edit' => Pages\EditDynamicPopUp::route('/{record}/edit'),
        ];
    }
}
