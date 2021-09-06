<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom'=>$this->faker->name('male'|'female'),
            'description'=>$this->faker->realText($maxNbChars = 250, $indexSize = 2),
            'auteur'=>$this->faker->name('male'|'female'),
            'photo_profil'=>$this->faker->imageUrl($width = 640, $height = 480), 
        ];
    }
}
