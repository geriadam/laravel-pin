<?php

namespace Database\Factories;

use App\Models\Pin;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pin>
 */
class PinFactory extends Factory
{
    protected $model = Pin::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $randomWidth = [150, 200, 250, 300, 350, 400, 450, 500, 600, 800];
        $randomHeight = [100, 150, 200, 250, 300, 350];

        return [
            'user_id' => function () {
                return User::factory()->create()->id;
            },
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(1),
            'image' => $this->faker->image(Storage::disk('pin')->path(''), Arr::random($randomWidth), Arr::random($randomHeight), null, false),
            'is_publish' => $this->faker->boolean(),
        ];
    }
}
