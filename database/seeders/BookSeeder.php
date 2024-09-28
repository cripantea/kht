<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $randomImageUrl = 'https://picsum.photos/480/640';

        // Download the image
        $response = Http::get($randomImageUrl);

        // Save the image to the disk (e.g., public/photos folder)
        $imageName = Str::random(10) . '.jpg';
        Storage::put('public/photos/' . $imageName, $response->body());

        // Seed the path into the database
        Book::create([
            'name' => $this->faker->word,
            'description' => $this->faker->text,
            'price' => $this->faker->randomFloat(2, 10, 100),
            'photo_path' => 'photos/' . $imageName, // Local path for the saved image
        ]);
    }
}
