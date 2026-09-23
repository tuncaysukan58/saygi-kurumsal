<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Sector;
use App\Models\Service;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(): View
    {
        return view('site.services-index', [
            'services' => Service::where('is_active', true)->orderBy('order')->get(),
        ]);
    }

    public function show(Service $service): View
    {
        abort_unless($service->is_active, 404);

        return view('site.services-show', [
            'service' => $service->load('items'),
            'sectors' => Sector::orderBy('order')->get(),
        ]);
    }
}
