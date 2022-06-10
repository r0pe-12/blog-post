<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'=>1,
            'title'=>$this->faker->text(60),
            'slug'=>$this->faker->slug,
            'short_description'=>$this->faker->text(100),
            'content'=>$this->faker->text,
            'picture'=>$this->faker->imageUrl(900, 300),
//            'published_at'=>$this->faker->time('H:i:s'),
        ];
    }
}
