<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Project;
use App\Models\Category;
use App\Models\Tag;


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
        $body = '<p>' . join('</p></p>', $bodyArray) . '</p>';
        $title = fake()->company() . ' ' . fake()->companySuffix();
        $titleString = str($title);
        $slug = Str::slug($titleString, '-');
        $tags = Tag::all()->random(3);

        return [
            'title' => $title,
            'excerpt' => fake()->catchPhrase(),
            'body' => $body,
            'slug' => $slug,
            'url' => fake()->url(),
            'published_date' => fake()->dateTimeBetween('-1 year', 'now'),
            'category_id' => Category::all()->random()->id,
            'image' => fake()->imageUrl(640, 480, 'business', true),
            'thumb' => fake()->imageUrl(640, 480, 'business', true),
            'tags' => $tags

        ];
    }

}