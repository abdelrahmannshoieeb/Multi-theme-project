<?php

namespace App\Filament\Pages;

use App\Models\Branch;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Product;
use App\Models\SkuCode;
use App\Models\SkuStock;
use Carbon\Carbon;
use Closure;
use Filament\Actions\Concerns\HasForm;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Infolists\Components\TextEntry;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Contracts\View\View;

class POS extends Page implements HasForms
{

    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-cursor-arrow-rays';

    protected static ?string $slug = 'POS';

    protected static ?string $title = 'POS';


    protected static string $view = 'filament.pages.p-o-s';

    protected static ?string $navigationLabel = "POS (Point Of Sale)";


    public $branch_id;
    public $customer_id;
    public $notes;
    public $coupon;
    public $amount = 0;
    public $total_amount = 0;
    public $discount = 0;
    public $receipt_number;
    public $items;
    public $payment_status;
    public $payment_method;
    public $status;
    public $claim_type;

    public function form(Form $form): Form
    {
        return $form->schema([
            Section::make("")
                ->schema([

                    Section::make("Customer")
                        ->schema([

                            TextInput::make("receipt_number")
                            ->label("Receipt Number")
                            ->required()
                            ->unique()
                            ->placeholder("Receipt Number")
                            ->default($this->receipt_number)
                            ->afterStateUpdated(function ($state,Set $set) {
                                if ($state == null) {
                                    $set("receipt_number","E-COMMERCE-");  
                                }
                            })
                            ->reactive(),

                            Select::make("customer_id")
                                ->required()
                                ->label("Customer")
                                ->native(false)
                                ->preload()
                                ->options(Customer::all()->pluck("fullname", "id")->toArray()),



                            Select::make("branch_id")
                                ->required()
                                ->label("Branch")
                                ->native(false)
                                ->reactive()
                                ->preload()
                                ->options(Branch::all()->pluck("name", "id")->toArray())
                                ->default(Branch::first()->id),



                            Textarea::make("notes")->columnSpanFull(),

                            Select::make('payment_status')
                                ->label('Payment Status')
                                ->native(false)
                                ->searchable()
                                ->preload()
                                ->options([
                                    'Pending' => 'Pending',
                                    'Paid' => 'Paid',
                                    'Unpaid' => 'Unpaid',
                                    'Failed' => 'Failed',
                                    'Canceled' => 'Canceled',
                                ])
                                ->required()
                                ->placeholder('Select a payment status'),

                            Select::make('payment_method')
                                ->label('Payment Method')
                                ->native(false)
                                ->searchable()
                                ->preload()
                                ->options([
                                    'Cash' => 'Cash',
                                    'Credit Card' => 'Credit Card',
                                ])
                                ->required() // Optional if the field must be filled
                                ->placeholder('Select a payment method'),


                            Select::make('status')
                                ->label('Order Status')
                                ->native(false)
                                ->searchable()
                                ->default($this->status)
                                ->preload()
                                ->options([
                                    'Pending' => 'Pending',
                                    'Preparing' => 'Preparing',
                                    'In Queue' => 'In Queue',
                                    'Ready' => 'Ready',
                                    'Dispatched' => 'Dispatched',
                                    'Completed' => 'Completed',
                                    'Canceled' => 'Canceled',
                                    'Failed' => 'Failed',
                                ])
                                ->required() // Optional if the field must be filled
                                ->placeholder('Select an order status'),

                            Select::make('claim_type')
                                ->label('Claim Type')
                                ->native(false)
                                ->searchable()
                                ->preload()
                                ->options([
                                    'Delivery' => 'Delivery',
                                    'On Branch' => 'On Branch',
                                ])
                                ->required() // Optional if the field must be filled
                                ->placeholder('Select a claim type')

                        ])->columnSpan(6)->columns(3),

                    Section::make("Summery")
                        ->schema([
                            TextInput::make("coupon")
                                ->placeholder("Enter Your Coupon")
                                ->reactive()
                                ->columnSpan(3),

                            TextInput::make("amount")
                                ->required()
                                ->readOnly()
                                ->numeric()
                                ->minValue(1)
                                ->afterStateUpdated(function () {
                                    $this->calculate_total_amount();
                                })
                                ->columnSpan(1)
                                ->reactive()
                                ->default($this->amount),

                            TextInput::make("discount")
                                ->required()
                                ->numeric()
                                ->reactive()
                                ->columnSpan(2)
                                ->minValue(0)
                                ->maxValue(fn($get) => $get("amount"))
                                ->afterStateUpdated(function () {
                                    $this->calculate_total_amount();
                                })
                                ->default(0),
                            TextInput::make("total_amount")
                                ->required()
                                ->readOnly()
                                ->label("Total Amount")
                                ->numeric()
                                ->reactive()
                                ->columnSpan(3)
                                ->default($this->total_amount),

                        ])->columnSpan(3),


                    Section::make("Items")
                        ->visible(fn($get) => $get("branch_id") !== null ? true : false)
                        ->schema([

                            Repeater::make("items")
                                ->reactive()
                                ->cloneable(true)
                                ->reorderableWithDragAndDrop(false)
                                ->reorderableWithButtons(true)
                                ->collapsible()
                                ->columns(6)
                                ->schema([
                                    Select::make("product_id")
                                        ->required()
                                        ->label("Product")
                                        ->native(false)
                                        ->reactive()
                                        ->preload()
                                        ->options(Product::all()->pluck("name", "id")->toArray()),

                                    Select::make("sku_id")
                                        ->required()
                                        ->label("SKU Code")
                                        ->native(false)
                                        ->preload()
                                        ->reactive()
                                        ->options(function (Get $get) {
                                            return SkuCode::where("product_id", $get("product_id"))
                                                ->pluck("code", "id")->toArray();
                                        })
                                        ->afterStateUpdated(function ($state, Get $get, Set $set) {

                                            $sku_code = SkuCode::where("id", $state)->first();

                                            $stock = SkuStock::where("sku_id", $state)
                                                ->where("branch_id", $this->branch_id)->first()->count ?? 0;
                                            if ($stock == 0) {
                                                $set("stock", $stock);
                                                $set("price", 0);
                                                $set("minimum", 0);
                                                $set("maximum", 0);
                                                $set("qty", 0);
                                                $set("total", 0);
                                            } else {

                                                $set("stock", $stock);
                                                $set("price", $sku_code->price);
                                                $set("minimum", $sku_code->minimum);
                                                $set("maximum", $sku_code->maximum);
                                                $set("qty", 0);
                                                $set("total", 0);
                                            }
                                        }),

                                    TextInput::make("stock")
                                        ->required()
                                        ->readOnly()
                                        ->numeric()
                                        ->default(0),

                                    TextInput::make("price")
                                        ->required()
                                        ->readOnly()
                                        ->numeric()
                                        ->default(0),

                                    Hidden::make("minimum")
                                        ->reactive()
                                        ->default(0),

                                    Hidden::make("maximum")
                                        ->reactive()
                                        ->default(0),

                                    TextInput::make("qty")
                                        ->required()
                                        ->numeric()
                                        ->reactive()
                                        ->minValue(fn($get) => $get("minimum") ?? 1)
                                        ->maxValue(fn($get) => $get("maximum"))
                                        ->afterStateUpdated(function ($state, Get $get, Set $set) {

                                            $qty = $state;
                                            $price = $get("price");
                                            $set("total", $qty * $price);


                                            $set("amount", 0);
                                            $total_amount_calculate = 0;

                                            foreach ($this->items as $item) {
                                                $total_amount_calculate += $item["total"];
                                            }

                                            $this->amount = $total_amount_calculate;

                                            $this->calculate_total_amount();
                                        })
                                        ->default(0),

                                    TextInput::make("total")
                                        ->required()
                                        ->readOnly()
                                        ->numeric()
                                        ->reactive()
                                        ->minValue(1)
                                        ->afterStateUpdated(function ($state, Set $set, Get $get) {

                                            $this->calculate_items($set, $get);
                                        })
                                        ->default(0),
                                ])
                                ->afterStateUpdated(function ($state, Set $set, Get $get) {
                                    if (count($state) >= 1) {
                                        $this->calculate_items($set, $get);
                                        $this->calculate_total_amount();
                                    } else {

                                        $set("amount", 0);
                                        $set("total_amount", 0);
                                        $set("discount", 0);
                                    }
                                })
                        ]),

                ])->columns(9)
        ]);
    }

     public function changePassword() 
    {
        $this->validate();
        $receipt_number_founded = Order::where("receipt_number",$this->receipt_number)->first() ? true : false;
        if ($receipt_number_founded) {
            Notification::make("Error")
            ->title("Please Choose Unique Receipt Number")
            ->danger()
            ->send();
        return;
        }

        if ($this->items == null || count($this->items) < 1) {

            Notification::make("Error")
                ->title("Please Fill Items Before Save Order")
                ->danger()
                ->send();
            return;
        }

        // Start Insert Order 
         $order = Order::create([
            'branch_id' => $this->branch_id,
            'customer_id' => $this->customer_id,
            'receipt_number' => $this->receipt_number,
            'notes' => $this->notes ?? null,
            'delivery_price' => $this->delivery_price ?? 0,
            'coupon_id' => $this->coupon_id ?? null,
            'total_price' => $this->amount,
            'discount' => $this->discount,
            'total_amount' => $this->total_amount,
            'payment_method' => $this->payment_method,
            'payment_status' => $this->payment_status,
            'status' => $this->status,
            'claim_type' => $this->claim_type,
            'claim_at' => Carbon::now(),
        ]);

        if ($order) {

            $items = $this->items;

            foreach ($items as $item) {
                OrderItems::create([
                    'order_id' => $order->id,
                    'customer_id' => $this->customer_id,
                    'product_id' => $item["product_id"],
                    'sku_id' => $item["sku_id"],
                    'branch_id' => $this->branch_id,
                    'qty' => $item["qty"],
                    'price' => $item["price"],
                    'total' => $item["total"],
                ]);

                SkuStock::where("sku_id",$item["sku_id"])
                    ->where("branch_id",$this->branch_id)
                    ->where("product_id",$item["product_id"])
                    ->decrement("count",$item["qty"]);
            }

           $notify =  Notification::make("Success")
            ->title("Order Created Succefully")
            ->success()
            ->duration(2000)
            ->send();

            if ($notify) {
                $this->branch_id = null;
                $this->customer_id = null;
                $this->receipt_number = null;
                $this->notes = null;
                $this->amount = 0;
                $this->total_amount = 0;
                $this->discount = 0;
                $this->items = [];
                $this->payment_status = null;
                $this->payment_method = null;
                $this->status = null;
                $this->claim_type = null;
                $this->coupon = null;

            }

        }

    }

    public function calculate_items(Set $set, Get $get)
    {



        $items = $this->items;


        $total_amount_calculate = 0;

        foreach ($items as $key => $value) {

            $total_amount_calculate += $value["total"];
        }
        $set("amount", $total_amount_calculate);

        $this->calculate_total_amount();
    }

    public function calculate_total_amount()
    {

        $amount = $this->amount;
        $discount = $this->discount ?? 0;

        $total_amount = $amount - intval($discount);

        $this->total_amount = $total_amount;
    }
}
