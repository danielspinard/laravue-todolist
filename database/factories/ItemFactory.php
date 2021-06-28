<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Item::class;

    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->text(8)
        ];
    }
}
