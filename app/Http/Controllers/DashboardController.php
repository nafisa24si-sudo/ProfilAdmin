<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Berita;
use App\Models\Warga;
use App\Models\Kategori;
use App\Models\Agenda;
use App\Models\Galeri;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_users' => User::count(),
            'total_berita' => Berita::count(),
            'total_warga' => Warga::count(),
            'total_kategori' => Kategori::count(),
            'total_agenda' => Agenda::count(),
            'total_galeri' => Galeri::count(),
        ];

        $recentBerita = Berita::with('kategori')
            ->latest()
            ->take(5)
            ->get();

        $monthlyBerita = Berita::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as count')
        )
        ->whereYear('created_at', date('Y'))
        ->groupBy('month')
        ->pluck('count', 'month')
        ->toArray();

        $chartData = [];
        for ($i = 1; $i <= 12; $i++) {
            $chartData[] = $monthlyBerita[$i] ?? 0;
        }

        return view('pages.dashboard', compact('stats', 'recentBerita', 'chartData'));
    }
}