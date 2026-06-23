<?php

namespace App\Http\Controllers;

use App\Models\News;
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

        // Dummy statistics
        $statistics = [
            ['label' => 'Penduduk', 'value' => '2,450', 'icon' => '👥'],
            ['label' => 'Keluarga', 'value' => '680', 'icon' => '🏠'],
            ['label' => 'Luas Wilayah (Ha)', 'value' => '120', 'icon' => '🗺️'],
            ['label' => 'UMKM', 'value' => '45', 'icon' => '🏪'],
        ];

        return view('home', compact('latestNews', 'statistics'));
    }

    public function profil()
    {
        return view('profile');
    }
}
