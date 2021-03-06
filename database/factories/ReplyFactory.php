<?php

namespace Database\Factories;

use App\Models\Reply;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;

class ReplyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reply::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'body'  => $this->faker->text,

            'user_id'     => function()
            {
                return  User::all()->random();
            },

            'question_id'     => function()
            {
                return  Category::all()->random();
            }
        ];
    }
}
