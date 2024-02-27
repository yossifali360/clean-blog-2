<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=category>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imageUrl = fake()->image();
        $imageContent = file_get_contents($imageUrl);
        $filename = 'your_model_' . time() . '_' . Str::random(10) . '.jpg';
        Storage::disk('public')->put($filename, $imageContent);
        return [
            'title' => fake()->title(),
            'body' => fake()->paragraph(),
            
            'status' => 'active',
            'image' => $filename,
        ];
    }
}
