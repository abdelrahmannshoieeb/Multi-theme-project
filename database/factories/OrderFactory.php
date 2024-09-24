<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{

    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'branch_id' => Branch::first()->id,
            'customer_id' => Customer::first()->id,
            'receipt_number' => Str::random(10),
            'notes' => $this->faker->sentence(),
            'delivery_price' => $this->faker->randomFloat(2, 5, 50),
            'total_price' => $this->faker->randomFloat(2, 50, 500),
            'discount' => $this->faker->randomFloat(2, 5, 50),
            'total_amount' => $this->faker->randomFloat(2, 50, 500),
            'payment_method' => $this->faker->randomElement(['Cash', 'Credit Card']),
            'payment_status' => $this->faker->randomElement(['Pending', 'Paid', 'Unpaid', 'Failed', 'Canceled']),
            'status' => $this->faker->randomElement(['Pending', 'Preparing', 'In Queue', 'Ready', 'Dispatched', 'Completed', 'Canceled', 'Failed']),
            'claim_type' => $this->faker->randomElement(['Delivery', 'On Branch']),
            'claim_at' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
        ];
    }
}
