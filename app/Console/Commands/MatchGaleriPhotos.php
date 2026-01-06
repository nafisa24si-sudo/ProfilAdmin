<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Galeri;

class MatchGaleriPhotos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * --apply: actually update the DB
     */
    protected $signature = 'galeri:match-photos {--apply : Apply suggested updates}';

    /**
     * The console command description.
     */
    protected $description = 'Suggest and optionally apply matches between files in storage/galeri-photos and galeri records with empty foto';

    public function handle()
    {
        $this->info('Scanning storage/app/public/galeri-photos ...');

        $disk = Storage::disk('public');
        $files = $disk->files('galeri-photos');

        if (empty($files)) {
            $this->info('No files found in public/galeri-photos.');
            return 0;
        }

        $filesInfo = [];
        foreach ($files as $file) {
            $fullPath = storage_path('app/public/' . $file);
            if (!file_exists($fullPath)) continue;
            $filesInfo[] = [
                'file' => $file,
                'mtime' => filemtime($fullPath),
            ];
        }

        $galeris = Galeri::whereNull('foto')
                    ->orWhere('foto', '')
                    ->get();

        if ($galeris->isEmpty()) {
            $this->info('No galeri records with empty foto found.');
            return 0;
        }

        $this->info('Found ' . count($filesInfo) . ' files and ' . $galeris->count() . ' galeri records with empty foto.');

        $suggestions = [];

        foreach ($filesInfo as $f) {
            $best = null;
            foreach ($galeris as $g) {
                $created = strtotime($g->created_at);
                $diff = abs($f['mtime'] - $created);
                if (is_null($best) || $diff < $best['diff']) {
                    $best = [
                        'galeri_id' => $g->galeri_id,
                        'judul' => $g->judul,
                        'diff' => $diff,
                    ];
                }
            }
            if ($best) {
                $suggestions[] = [
                    'file' => $f['file'],
                    'galeri_id' => $best['galeri_id'],
                    'judul' => $best['judul'],
                    'diff' => $best['diff'],
                ];
            }
        }

        if (empty($suggestions)) {
            $this->info('No suggestions could be built.');
            return 0;
        }

        // Show suggestions
        $rows = [];
        foreach ($suggestions as $s) {
            $rows[] = [
                $s['galeri_id'],
                $s['judul'],
                $s['file'],
                $s['diff']
            ];
        }

        $this->table(['galeri_id','judul','file','diff_seconds'], $rows);

        $apply = $this->option('apply');
        if (!$apply) {
            $this->info('Run with --apply to actually update the DB with these mappings.');
            return 0;
        }

        // Apply updates
        foreach ($suggestions as $s) {
            try {
                Galeri::where('galeri_id', $s['galeri_id'])->update(['foto' => $s['file']]);
                $this->line("Updated galeri_id={$s['galeri_id']} => {$s['file']}");
            } catch (\Exception $e) {
                $this->error('Failed to update galeri_id=' . $s['galeri_id'] . ': ' . $e->getMessage());
            }
        }

        $this->info('Done.');
        return 0;
    }
}
