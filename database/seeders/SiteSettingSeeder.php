<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        SiteSetting::create([
            'site_name' => 'London Elite Trades Ltd',
            'logo_path' => null,
            
            'phone' => '0203 172 4720',
            'email' => 'info@londonelitetrades.co.uk',
            'address' => "London Elite Trades Ltd 4th Floor\nSilverstream House 45 Fitzroy Street\nFitzrovia London W1T 6EB",
            'opening_hours' => "Monday - Friday 9am - 5:30pm\nClosed at weekends",
            
            'hero_title' => "Transform Your Home or \nPremises to Maximise it's Full Potential",
            'hero_description' => "From design to completion, we manage your entire project from start to finish, to ensure a stress-free and comfortable experience with us.",
            
            'about_title' => "Why Choose Us?",
            'about_description' => "We handle every stage, from initial design to final completion, ensuring a seamless & stress-free experience.",
            
            'footer_description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
            
            'social_facebook' => '#',
            'social_instagram' => '#',
            'social_linkedin' => '#',
        ]);
    }
}
