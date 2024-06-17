<?php

namespace Database\Factories;

use App\Models\Artwork;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artwork>
 */
class ArtworkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Artwork::class;
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // Assuming a user factory exists
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'upload_date' => $this->faker->date,
            'medium' => $this->faker->word,
            'dimensions' => $this->faker->randomNumber(2) . 'x' . $this->faker->randomNumber(2),
            'image_url' => $this->faker->imageUrl,
            'visibility' => $this->faker->randomElement(['public', 'private']),
        ];
    }
}
