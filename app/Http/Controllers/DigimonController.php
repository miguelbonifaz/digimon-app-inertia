<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class DigimonController extends Controller
{
    public function index()
    {
        $queryString = [
            'pageSize' => $pageSize = request('pageSize', 10),
            'page' => $page = request('page', 0)
        ];

        $cacheKey = "digimons.page{$page}.pageSize{$pageSize}";
        $ttl = 60;

        $digimons = Cache::remember(
            key: $cacheKey,
            ttl: $ttl,
            callback: fn() => Http::get("https://digi-api.com/api/v1/digimon?pageSize=$pageSize&page=$page")->json()
        );

        return Inertia::render('Digimon/Index', [
            'digimons' => $digimons,
            'queryString' => $queryString
        ]);
    }
}
