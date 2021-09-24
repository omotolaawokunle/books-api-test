<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->words(3, true),
            'isbn' => rand(100, 999) . "-" . rand(1000000000, 9999999999),
            'authors' => [$this->faker->name()],
            'number_of_pages' => rand(100, 1000),
            'publisher' => $this->faker->company(),
            'country' => $this->faker->country(),
            'release_date' => $this->faker->date()
        ];
    }
}
