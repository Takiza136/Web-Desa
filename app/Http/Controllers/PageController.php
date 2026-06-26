<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\ResidentArchive;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        // Get 3 latest news (with try-catch for Vercel)
        try {
            $latestNews = News::latest('published_at')->take(3)->get();
        } catch (\Exception $e) {
            // Jika database tidak tersedia (misal di Vercel), gunakan data kosong
            $latestNews = collect([]);
        }

        // Live statistics dari hasil Pengarsipan Data Warga
        try {
            $pendudukCount = ResidentArchive::distinct('nik')->count('nik');
            $keluargaCount = ResidentArchive::whereNotNull('no_kk')->where('no_kk', '!=', '')->distinct('no_kk')->count('no_kk');
            $pendudukValue = number_format($pendudukCount);
            $keluargaValue = number_format($keluargaCount);
        } catch (\Exception $e) {
            $pendudukValue = '0';
            $keluargaValue = '0';
        }

        $statistics = [
            ['label' => 'Penduduk Terdata', 'value' => $pendudukValue, 'icon' => '👥'],
            ['label' => 'Keluarga (KK)', 'value' => $keluargaValue, 'icon' => '🏠'],
            ['label' => 'Luas Wilayah (Ha)', 'value' => '120', 'icon' => '🗺️'],
            ['label' => 'UMKM Desa', 'value' => '45', 'icon' => '🏪'],
        ];

        return view('home', compact('latestNews', 'statistics'));
    }

    public function profil()
    {
        return view('profile');
    }
}
