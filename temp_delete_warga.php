<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
$id = 3;
$w = App\Models\Warga::where('id_warga',$id)->first();
if($w){ echo "Found: id_warga={$w->id_warga}, nik={$w->nik}, nama={$w->nama}\n"; $w->delete(); echo "Deleted\n"; } else { echo "Not found\n"; }
$rows = App\Models\Warga::all()->pluck('id_warga')->toArray(); print_r($rows);
