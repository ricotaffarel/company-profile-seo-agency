<?php

namespace Database\Factories;

use App\Models\About;
use Illuminate\Database\Eloquent\Factories\Factory;

class AboutFactory extends Factory
{
    protected $model = About::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'desc' => $this->faker->sentence,
            'about_1' => $this->faker->sentence,
            'about_2' => $this->faker->sentence,
            'about_3' => $this->faker->sentence,
            'about_4' => $this->faker->sentence,
            'image' => $this->faker->sentence,
            // tambahkan kolom lainnya sesuai kebutuhan
        ];
    }
}
