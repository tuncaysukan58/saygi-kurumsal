<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Sector;
use Illuminate\View\View;

class SectorController extends Controller
{
    public function index(): View
    {
        return view('site.sectors', [
            'sectors' => Sector::orderBy('order')->get(),
        ]);
    }

    public function show(Sector $sector): View
    {
        return view('site.sector-show', [
            'sector'  => $sector,
            'sectors' => Sector::orderBy('order')->get(),
        ]);
    }
}
