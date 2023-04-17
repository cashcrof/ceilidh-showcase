<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected function fakeHTMLParagraphs($count = 3)
    {
        $bodyArray = fake()->paragraphs($count);
        $body = '<p>' . join('</p></p>', $bodyArray) . '</p>';
        return $body;
    }

    public function run()
    {
        Project::create([
            'title' => 'Portfolio Showcase',
            'excerpt' => fake()->sentences(2, true),
            'body' => $this->fakeHTMLParagraphs(4),
            'category_id' => 3,
            'slug' => 'portfolio-showcase',
        ]);
        Project::create([
            'title' => 'SSD Yearbook',
            'excerpt' => fake()->sentences(2, true),
            'body' => $this->fakeHTMLParagraphs(),
            'category_id' => 1,
            'slug' => 'ssd-yearbook'
        ]);
        Project::create([
            'title' => 'Movie Mania',
            'excerpt' => fake()->sentences(2, true),
            'body' => $this->fakeHTMLParagraphs(5),
            'slug' => 'movie-mania'
        ]);
        Project::create([
            'title' => 'News Site Homepage',
            'excerpt' => fake()->sentences(2, true),
            'body' => $this->fakeHTMLParagraphs(),
            'category_id' => 2,
            'slug' => 'news-site-homepage'
        ]);
        Project::create([
            'title' => 'JavaScript Game',
            'excerpt' => fake()->sentences(2, true),
            'body' => $this->fakeHTMLParagraphs(),
            'category_id' => 2,
            'slug' => 'javascript-game'
        ]);
        Project::create([
            'title' => 'iOS App',
            'excerpt' => fake()->sentences(2, true),
            'body' => $this->fakeHTMLParagraphs(),
            'slug' => 'ios-app'
        ]);
        Project::create([
            'title' => 'Android App',
            'excerpt' => fake()->sentences(2, true),
            'body' => $this->fakeHTMLParagraphs(),
            'slug' => 'android-app'
        ]);
        Project::create([
            'title' => 'Industry Project',
            'excerpt' => fake()->sentences(2, true),
            'body' => $this->fakeHTMLParagraphs(6),
            'category_id' => 3,
            'slug' => 'industry-project'
        ]);
    }
}