<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition()
    {
        $bodyArray = fake()->paragraphs(3);
        $body = '<p>' . join('</p></p>', $bodyArray ) . '</p>';
        $title = fake()->company() . ' ' . fake()->companySuffix();
        $titleString = str($title);
        $slug = Str::slug($titleString, '-');
    
        return [
            'title' => $title,
            'excerpt' => fake()->catchPhrase(),
            'body' => $body,
            'slug' => $slug
        ];
    }

}
