<?php

namespace Database\Factories;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuFactory extends Factory
{
    protected $model = Menu::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'title' => $this->faker->sentence,
            // tambahkan kolom lainnya sesuai kebutuhan
        ];
    }
}
