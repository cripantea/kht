<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $randomImageUrl = 'https://picsum.photos/480/640';

        $response = Http::get($randomImageUrl);
        $imageName = Str::random(10) . '.jpg';
        Storage::disk('public')->put('photos/' . $imageName, $response->body());

        return [
            'name' => $this->faker->words(2, true),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomFloat(2, 5, 40),
            'image' => $imageName,

        ];
    }
}
