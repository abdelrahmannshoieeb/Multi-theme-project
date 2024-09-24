<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Filament\Resources\ProductResource\RelationManagers\SkuCodesRelationManager;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make('Product Details')
                    ->collapsible()
                    ->icon("heroicon-o-shopping-cart")
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->placeholder("Name")
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('parent_sku')
                            ->placeholder("SKU")
                            ->required()
                            ->unique()
                            ->visibleOn(['create'])
                            ->maxLength(255),

                        Forms\Components\TextInput::make('price')
                            ->placeholder("Price")
                            ->required()
                            ->numeric()
                            ->prefix('$'),
                            TextInput::make('discount')
                            ->placeholder('Discount')
                            ->maxValue(100)
                            ->label('Discount')
                            ->numeric()
                            ->required(),
                        Forms\Components\MarkdownEditor::make('description')
                            ->placeholder("Description")
                            ->required()
                            ->columnSpanFull()
                            ->maxLength(255),
                    ])
                    ->columns(2)
                    ->columnSpan(2),

                Section::make('Status')
                    ->collapsible()
                    ->icon("heroicon-o-check")
                    ->schema([
                        ToggleButtons::make('status')
                            ->options([
                                'in stock' => 'In Stock',
                                'sold out' => 'Sold Out',
                                'coming soon' => 'Coming Soon'
                            ])
                            ->icons([
                                'in stock' => 'heroicon-o-check',
                                'sold out' => 'heroicon-o-x-mark',
                                'coming soon' => 'heroicon-o-clock',
                            ])
                            ->colors([
                                'in stock' => 'success',
                                'sold out' => 'danger',
                                'coming soon' => 'warning',
                            ])
                            ->default('in stock')
                            ->required(),


                            Forms\Components\Select::make('stars')
                            ->label('Stars')
                            ->native(false)
                            ->searchable()
                            ->preload()
                            ->options([
                                "1" => "1",
                                "2" => "2",
                                "3" => "3",
                                "4" => "4",
                                "5" => "5",
                            ])
                            ->required(),

                    ])->columnSpan(1),

                Section::make('Images')
                    ->collapsible()
                    ->icon("heroicon-o-photo")
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->image()
                            ->directory("product-image")
                            ->required(),
                        Forms\Components\FileUpload::make('gallery')
                            ->multiple()
                            ->directory("product-gallery")
                            ->required()

                    ])->columnSpan(2),
                Section::make('Associations')
                    ->collapsible()
                    ->icon("heroicon-o-pencil")
                    ->schema([
                        Forms\Components\Select::make('category_id')
                            ->label('Category')
                            ->native(false)
                            ->searchable()
                            ->preload()
                            ->options(\App\Models\Category::all()->pluck('fullname', 'id'))
                            ->required(),


                        Forms\Components\Select::make('brand_id')
                            ->label('Brand')
                            ->native(false)
                            ->searchable()
                            ->preload()
                            ->options(\App\Models\Brand::all()->pluck('name', 'id'))
                            ->required(),

                        TagsInput::make('tags')
                            ->separator(',')
                            ->required(),


                            Toggle::make('isFeatured')
                            ->default(false)
                            ->required()
                            ->label('Is Featured?'),
                            Toggle::make('isBestSelling')
                            ->default(false)
                            ->required()
                            ->label('Is Best Selling?'),
                            Toggle::make('isTopRated')
                            ->default(false)
                            ->required()
                            ->label('Is Top Rated?'),
                      
            

                    ])->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('parent_sku')
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('category.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('brand.name')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'in stock' => 'success',
                        'sold out' => 'danger',
                        'coming soon' => 'warning',
                    })
                    ->icon(fn(string $state): string => match ($state) {
                        'in stock' => 'heroicon-o-check',
                        'sold out' => 'heroicon-o-x-mark',
                        'coming soon' => 'heroicon-o-clock',
                    }),
                Tables\Columns\TextColumn::make('price')
                    ->money()
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
            SkuCodesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'view' => Pages\ViewProduct::route('/{record}'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
