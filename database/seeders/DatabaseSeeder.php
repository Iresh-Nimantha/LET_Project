<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\SiteSetting;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::updateOrCreate(
            ['email' => 'nimanthairesh9@gmail.com'],
            [
                'name' => 'Nimanthairesh',
                'password' => Hash::make('123456'),
            ]
        );

        $this->call([
            SiteSettingSeeder::class,
            DummyDataSeeder::class,
        ]);

        // Update logo path in existing setting or create new
        $setting = SiteSetting::first();
        if ($setting) {
            $setting->update(['logo_path' => 'logo.png']);
        }
    }
}
