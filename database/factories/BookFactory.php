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
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'isbn' => $this->faker->isbn13,
            'publisher' => $this->faker->company ,
            'gender' => $this->faker->randomElement(['ADVENTURE','FANTASY','FICTION','HORROR','MYSTERY','ROMANCE','TRAGEDY']),
            'year' => rand(1900, intval(date('Y'))),
            'created_by' => $this->faker->email,
            'author_id' => rand(1, 10),
        ];
    }
}
