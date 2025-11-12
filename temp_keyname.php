<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
$w = new App\Models\Warga();
echo 'getKeyName: ' . $w->getKeyName() . PHP_EOL;
echo 'primaryKey property exists? ' . (property_exists($w,'primaryKey') ? 'yes' : 'no') . PHP_EOL;
// Use Reflection to read the protected property value
$ref = new ReflectionClass($w);
$prop = $ref->getProperty('primaryKey');
$prop->setAccessible(true);
echo 'primaryKey property value (reflection): ' . $prop->getValue($w) . PHP_EOL;
print_r((new ReflectionClass($w))->getFileName());
