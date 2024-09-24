<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SkuCodeResource\Pages;
use App\Filament\Resources\SkuCodeResource\RelationManagers;
use App\Models\Attribute;
use App\Models\Branch;
use App\Models\Product;
use App\Models\SkuCode;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SkuCodeResource extends Resource
{
    protected static ?string $model = SkuCode::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static bool $shouldRegisterNavigation = false;


    public static function form(Form $form): Form
    {


        $attributes = Attribute::all()->pluck("name", "id")->toArray();




        //    return dd($final_attributes);
        return $form
            ->schema([
                Section::make('Code Information')
                    ->collapsible()
                    ->icon("heroicon-o-information-circle")
                    ->schema([
                        Select::make('product_id')
                            ->label('Product')
                            ->options(Product::all()->pluck('name', 'id'))
                            ->required()
                            ->searchable(),
                        TextInput::make('code')
                            ->placeholder("SKU Code")
                            ->required()
                            ->unique(),
                        TextInput::make('price')
                            ->placeholder("Price")
                            ->prefix("$")
                            ->required()
                            ->minValue(0),

                        TextInput::make('minimum')
                            ->placeholder("Minimum")
                            ->minValue(0)
                            ->nullable(),
                        TextInput::make('maximum')
                            ->placeholder("Maximum")
                            ->minValue(0)
                            ->nullable(),
                    ])->columnSpan(1)->columns(3),

                Section::make('Attribute List')
                    ->collapsible()
                    ->icon("heroicon-o-list-bullet")
                    ->schema([
                        Repeater::make('attribute_list')
                            ->schema([
                                Select::make('attribute')
                                    ->label('Attribute')
                                    ->reactive()
                                    ->preload()
                                    ->options($attributes)
                                    ->rules([
                                        function ($component) {
                                            return function (string $attribute, $value, Closure $fail) use ($component) {

                                                $items = $component->getContainer()->getParentComponent()->getState();
                                                $selected = array_column($items, $component->getName());

                                                if (count(array_unique($selected)) < count($selected)) {
                                                    $fail('You can only select one option.');
                                                }
                                            };
                                        },
                                    ])
                                    ->searchable()
                                    ->afterStateUpdated(function ($state, Get $get, Set $set) {

                                        $set("name", Attribute::where("id", $state)->first()->name ?? "");
                                    }),



                                Hidden::make('name')
                                    ->reactive()
                                    ->default(function (Get $get) {
                                        $current_attribute = $get("attribute");
                                        return  Attribute::where("id", $current_attribute)->first()->name ?? "";
                                    }),

                                // This is the second field which will change its type based on the value of the first field
                                TextInput::make('value')
                                    ->label('Value')
                                    ->placeholder('Value')
                                    ->required()
                                    ->reactive()
                                    // ->visible(fn($get) => $get('attribute') !== null)  // Show only if first field is filled
                                    ->type(function (Get $get) {

                                        $current_attribute = $get("attribute");
                                        $current_attribute_type = Attribute::where("id", $current_attribute)->first()->type ?? "text";
                                        switch ($current_attribute_type) {
                                            case 'Text':
                                                return "text";
                                                break;
                                            case 'Number':
                                                return "number";
                                                break;
                                            case 'Color':
                                                return "color";
                                                break;
                                        }
                                    }),




                            ])->columns(2)->reactive(),
                    ])->columnSpan(1),


                Section::make("Stock")
                    ->collapsible()
                    ->icon("heroicon-o-archive-box")
                    ->schema([
                        Repeater::make('stock_list')
                            ->schema([

                                Select::make('branch_id')
                                    ->label('Branch')
                                    ->options(Branch::all()->pluck('name', 'id'))
                                    ->required()
                                    ->searchable(),
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
                                ToggleButtons::make('status')
                                    ->options([
                                        'unlimited' => 'In Stock',
                                        'base_on_stock' => 'Sold Out',
                                        'unavailable' => 'Coming Soon'
                                    ])
                                    ->icons([
                                        'unlimited' => 'heroicon-o-check',
                                        'base_on_stock' => 'heroicon-o-x-mark',
                                        'unavailable' => 'heroicon-o-clock',
                                    ])
                                    ->colors([
                                        'unlimited' => 'success',
                                        'base_on_stock' => 'danger',
                                        'unavailable' => 'warning',
                                    ])
                                    ->default('in stock')
                                    ->required()
                                    ->columnSpanFull(),
                            ])->columns(3)



                    ]),

            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make("code")
                ->searchable(isIndividual:true),
                TextColumn::make("product.name")
                ->searchable(isIndividual:true),


                TextColumn::make('attribute_list')
                    ->formatStateUsing(function ($state) {

                        $attribute_name = $state["name"] . ": " . $state["value"];
                        return $attribute_name;
                    })
                    ->label('Attributes')
                    ->listWithLineBreaks()  
                    ->bulleted(),




                TextColumn::make('price')
                ->label("Price")
                ->money("USD")
                  

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
            'index' => Pages\ListSkuCodes::route('/'),
            'create' => Pages\CreateSkuCode::route('/create'),
            'edit' => Pages\EditSkuCode::route('/{record}/edit'),
        ];
    }
}
