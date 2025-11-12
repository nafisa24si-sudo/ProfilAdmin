<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
$rows = App\Models\Warga::all()->map(function($w){return ['id_warga'=>$w->id_warga,'nik'=>$w->nik,'nama'=>$w->nama];})->toArray();
print_r($rows);
