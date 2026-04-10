<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$tables = ['services', 'projects', 'blogs', 'site_settings', 'vision_highlights'];
foreach($tables as $t) {
    if (Illuminate\Support\Facades\Schema::hasTable($t)) {
        echo $t.': '.implode(', ', Illuminate\Support\Facades\Schema::getColumnListing($t)).PHP_EOL;
    } else {
        echo $t.': table not found'.PHP_EOL;
    }
}
