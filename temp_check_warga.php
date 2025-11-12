<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
// Bootstrap the framework to access Eloquent
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$w = new App\Models\Warga();
echo 'Primary key: ' . $w->getKeyName() . PHP_EOL;
echo 'Incrementing: ' . ($w->getIncrementing() ? 'true' : 'false') . PHP_EOL;
echo 'Table: ' . $w->getTable() . PHP_EOL;
echo 'Class file: ' . (new \ReflectionClass(\App\Models\Warga::class))->getFileName() . PHP_EOL;
echo "\nFile contents:\n";
echo file_get_contents((new \ReflectionClass(\App\Models\Warga::class))->getFileName());

