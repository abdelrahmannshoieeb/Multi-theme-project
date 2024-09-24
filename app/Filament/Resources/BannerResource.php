<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerResource\Pages;
use App\Filament\Resources\BannerResource\RelationManagers;
use App\Models\Banner;
use Filament\Forms;
use Filament\Forms\Components\Actions\Action as ActionsAction;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Attributes\Title;

// use Filament\Tables\Filters\TextInputFilter;

class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;

    protected static ?string $navigationIcon = 'heroicon-o-paint-brush';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Banner')
                    ->collapsible()
                    ->icon("heroicon-o-paint-brush")
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->columnSpanFull()
                            ->required()
                            ->directory("banners")
                            ->image(),
                        Forms\Components\TextInput::make('title')
                            ->placeholder('Title')
                            ->required()
                            ->label('Title'),
                        Forms\Components\Textarea::make('description')
                            ->placeholder('Description')
                            ->required()

                            ->label('Description'),
                        Forms\Components\TextInput::make('discount')
                            ->placeholder('Discount')
                            ->required()
                            ->numeric()
                            ->label('Discount'),
                        Forms\Components\Select::make('text_dir')
                            ->options([
                                "center" => "Center",
                                "left" => "Left",
                                "right" => "Right",
                            ])
                            ->searchable()
                            ->required()
                            ->label('Text Direction'),
                            ColorPicker::make('description_color')
            
                            ->placeholder('Description Color')
                            ->required()
                            ->label('Description Color'),
                            
                            ColorPicker::make('title_color')
                            
                            ->label('Title Color')
                            ->placeholder('Title Color')
                            ->required(),
                        Forms\Components\Toggle::make('isActive')
                            ->default(true)
                            ->required()
                            ->label('Is Active'),
                    ])->columns(2),

                Section::make('BtnUrl-BtnText')
                    ->collapsible()
                    ->icon("heroicon-o-paint-brush")
                    ->schema([
                        Forms\Components\TextInput::make('btnText')
                            ->placeholder('Text')
                            ->required()
                            ->label('Button Text'),
                        Forms\Components\TextInput::make('btnURL')
                            ->placeholder('URL')
                            ->required()
                            ->url()
                            ->label('Button URL'),
                            ColorPicker::make('btn_bg_color')
                    
                            ->placeholder('Button Background Color')
                            ->label('Button Background Color')
                            ->placeholder('Button Background Color')
                            ->required(),
                            
                            ColorPicker::make('btn_text_color')
                        
                            ->placeholder('Button Text Color')
                             ->required()
                             ->label('Button Text Color'),
                         

                    ])->columns(2),


                Section::make('Banner Place')
                    ->collapsible()
                    ->icon("heroicon-o-paint-brush")
                    ->schema([
                        Forms\Components\Toggle::make('isHome')
                            ->required()
                            ->label('Is Home Main Banner ?'),
                        Forms\Components\Toggle::make('isHomeSub')
                            ->required()
                            ->label('Is Home Sub Banner ?'),

                        Forms\Components\Select::make('category_id')
                            ->searchable()
                            ->relationship(name: 'category', titleAttribute: 'name')
                            ->options(
                                \App\Models\Category::all()->pluck('name', 'id')

                            )
                            ->label('Category'),
                    ])->columns(2),


            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->label('Description')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('discount')
                    ->label('Discount')
                    ->sortable(),
                // Tables\Columns\TextColumn::make('btnText')
                //     ->label('Button Text')
                //     ->sortable(),

                Tables\Columns\BooleanColumn::make('isHome')
                    ->label('Is Home')
                    ->sortable(),
                Tables\Columns\BooleanColumn::make('isActive')
                    ->label('Is Active')
                    ->sortable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Category')

                    ->sortable(),
                // Tables\Columns\ViewColumn::make('email-direction')
                // ->label('URL button')
                // ->view('tables.columns.email-direction'),
            ])
            ->filters([
                SelectFilter::make('category_id')
                    ->label('Category')
                    ->options(
                        \App\Models\Category::all()->pluck('name', 'id')
                    ),

                // TextInputFilter::make('title')
                //     ->label('Title'),
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),

                Action::make('Go to Link')
                    ->url(fn(Banner $record): string => $record->btnURL ?? '')
                    ->openUrlInNewTab()
                    ->color('info')
                    ->icon('heroicon-o-link'),
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
            'index' => Pages\ListBanners::route('/'),
            'create' => Pages\CreateBanner::route('/create'),
            'edit' => Pages\EditBanner::route('/{record}/edit'),
        ];
    }
}
