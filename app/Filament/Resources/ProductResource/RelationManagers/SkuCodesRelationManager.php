<?php

namespace App\Filament\Resources\ProductResource\RelationManagers;

use App\Models\Attribute;
use App\Models\Branch;
use App\Models\Product;
use App\Models\SkuCode;
use App\Models\SkuStock;
use Closure;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SkuCodesRelationManager extends RelationManager
{
    protected static string $relationship = 'skuCodes';



    public function form(Form $form): Form
    {

        // Method to fetch and format data


        $attributes = Attribute::all()->pluck("name", "id")->toArray();



        return $form
            ->schema([


                Section::make('')

                    ->schema([

                        TextInput::make('code')
                            ->placeholder("SKU Code")
                            ->required()
                            ->visibleOn("create")
                            ->unique()
                            ->columnSpan(2),
                        TextInput::make('price')
                            ->placeholder("Price")
                            ->prefix("$")
                            ->required()
                            ->minValue(0),
                    ])->columnSpan(3)->columns(3),

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
                    ]),


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
                                    ->rules([
                                        function ($component) {
                                            return function (string $attribute, $value, Closure $fail) use ($component) {

                                                $items = $component->getContainer()->getParentComponent()->getState();
                                                $selected = array_column($items, $component->getName());

                                                if (count(array_unique($selected)) < count($selected)) {
                                                    $fail('You can only select branch for one time.');
                                                }
                                            };
                                        },
                                    ])
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
                            ])->columns(3)




                    ]),
            ])->columns(3);
    }


    public function table(Table $table): Table
    {


        return $table
            ->recordTitleAttribute('code')
            ->columns([
                TextColumn::make("code")
                    ->searchable(isIndividual: true),



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
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->action(function ($data) {
                        $productId = $this->ownerRecord->id;
                        $data["product_id"] = $productId;

                        $sku_code = SkuCode::create($data);

                        $stock_list = $data["stock_list"];

                        foreach ($stock_list as $stock) {
                            $stock["product_id"] = $productId;
                            $stock["sku_id"] = $sku_code->id;
                            SkuStock::create($stock);
                        }
                        Notification::make("A")
                            ->success()
                            ->title("Created Succefully")
                            ->send();
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->action(function ($data, SkuCode $record) {

                        $productId = $this->ownerRecord->id;

                        $stock_list = $data["stock_list"];

                        // Delete Previus Sku Stocks 
                        SkuStock::where("sku_id", $record->id)->delete();

                        $record->attribute_list = $data["attribute_list"];
                        $record->stock_list = $data["stock_list"];
                        $record->price = $data["price"];
                        $record->save();

                        // Update Sku Stocks 
                        foreach ($stock_list as $stock) {
                            $stock["product_id"] = $productId;
                            $stock["sku_id"] = $record->id;
                            SkuStock::create($stock);
                        }

                        Notification::make("A")
                            ->success()
                            ->title("Updated Succefully")
                            ->send();
                    }),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
