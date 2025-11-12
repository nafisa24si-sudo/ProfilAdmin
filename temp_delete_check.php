<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
$id=2; // try deleting id 2
$w = App\Models\Warga::where('id_warga',$id)->first();
if(!$w){ echo "Not found\n"; exit; }
var_dump($w->getAttributes());
$res = $w->delete();
var_dump($res);
use Illuminate\Support\Facades\DB;
$rows = DB::select('select id_warga,nik from wargas'); print_r($rows);
