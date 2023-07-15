<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    protected $model = Profile::class;

    public function definition()
    {
        return [
            'title_footer_1' => $this->faker->sentence,
            'title_footer_2' => $this->faker->sentence,
            'title_footer_3' => $this->faker->sentence,
            'title_footer_4' => $this->faker->sentence,
            'desc_title_footer_4' => $this->faker->sentence,
            'address' => $this->faker->sentence,
            'city' => $this->faker->sentence,
            'country' => $this->faker->sentence,
            'postal_code' => $this->faker->sentence,
            'phone' => $this->faker->sentence,
            'email' => $this->faker->sentence,
            'vision' => $this->faker->sentence,
            'mission' => $this->faker->sentence,
            'facebook' => $this->faker->sentence,
            'instagram' => $this->faker->sentence,
            'linkedin' => $this->faker->sentence,
            'twitter' => $this->faker->sentence,
            'link_map' => $this->faker->sentence,
            'copy_right' => $this->faker->sentence,
            'image' => $this->faker->sentence,
        ];
    }
}
