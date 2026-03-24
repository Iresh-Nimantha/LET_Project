<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\Project;
use App\Models\Testimonial;
use App\Models\Blog;
use Illuminate\Support\Str;

class DummyDataSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Services
        $services = [
            'LOFT CONVERSIONS AND EXTENSIONS',
            'COMPLETE PROPERTY REFURBISHMENTS',
            'BASEMENT RENOVATIONS & CONVERSIONS',
            'COMMERCIAL DEVELOPMENTS & REFURBISHMENTS',
            'KITCHEN & BATHROOM FITTING',
            'ROOFING & STRUCTURAL WORKS'
        ];

        foreach ($services as $serviceTitle) {
            Service::create([
                'title' => $serviceTitle,
                'slug' => Str::slug($serviceTitle),
                'description' => "We provide professional " . strtolower($serviceTitle) . " tailored to your exact specifications. From design to completion, we manage your entire project.",
            ]);
        }

        // 2. Projects
        $projects = [
            ['title' => 'Kensington Townhouse Renovation', 'category' => 'Refurbishment'],
            ['title' => 'Chelsea Full Basement Conversion', 'category' => 'Basement'],
            ['title' => 'Mayfair Luxury Apartment', 'category' => 'Interior'],
            ['title' => 'Islington Double Story Extension', 'category' => 'Extension'],
            ['title' => 'Fulham Kitchen Redesign', 'category' => 'Kitchen'],
            ['title' => 'Camden Commercial Office Fitout', 'category' => 'Commercial'],
        ];

        foreach ($projects as $proj) {
            Project::create([
                'title' => $proj['title'],
                'slug' => Str::slug($proj['title']),
                'category' => $proj['category'],
                'description' => "A stunning " . strtolower($proj['category']) . " project delivered within budget and exceeding client expectations. We used the highest quality materials.",
            ]);
        }

        // 3. Testimonials
        $testimonials = [
            ['name' => 'Sarah Jenkins', 'quote' => "London Elite Trades completely transformed our home. The attention to detail during our loft conversion was incredible. Highly recommended!"],
            ['name' => 'Michael Davies', 'quote' => "Outstanding service from start to finish. The team was professional, kept the site clean, and delivered our kitchen extension exactly on time."],
            ['name' => 'Emily & John Robertson', 'quote' => "We hired LET for a full property refurbishment. Their craftsmanship and project management are second to none. A totally stress-free experience."],
            ['name' => 'David Thompson', 'quote' => "Very impressed with the commercial fitout they did for our new office. Completed the project swiftly with zero compromise on quality."],
            ['name' => 'Laura Harrison', 'quote' => "They guided us through the entire basement conversion process. The communication was excellent, and the final result is gorgeous."],
        ];

        foreach ($testimonials as $test) {
            Testimonial::create([
                'name' => $test['name'],
                'quote' => $test['quote'],
                'role' => 'Client',
            ]);
        }

        // 4. Blogs
        $blogs = [
            ['title' => '10 Tips for Planning a Loft Conversion in London', 'excerpt' => 'A loft conversion is one of the best ways to add space and value to your London property...'],
            ['title' => 'How to Choose the Right Contractor for Refurbishments', 'excerpt' => 'Selecting a building contractor can be daunting. Here are the key questions you need to ask...'],
            ['title' => 'Maximising Space: Basement Conversion Ideas', 'excerpt' => 'Unlock the hidden potential under your home with these creative and luxurious basement ideas...'],
        ];

        foreach ($blogs as $blog) {
            Blog::create([
                'title' => $blog['title'],
                'slug' => Str::slug($blog['title']),
                'excerpt' => $blog['excerpt'],
                'content' => str_repeat($blog['excerpt'] . ' ', 10),
            ]);
        }
    }
}
