<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
$id=3;
use Illuminate\Support\Facades\DB;
$affected = DB::delete('delete from wargas where id_warga = ?', [$id]);
echo "DB::delete affected: $affected\n";
$rows = DB::select('select id_warga,nik from wargas'); print_r($rows);
