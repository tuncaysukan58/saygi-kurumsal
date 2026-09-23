<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Faq;
use App\Models\HeroSlide;
use App\Models\HomeContent;
use App\Models\HomeFeature;
use App\Models\ProcessStep;
use App\Models\Project;
use App\Models\ReferenceLogo;
use App\Models\Sector;
use App\Models\Service;
use App\Models\Stat;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('site.home', [
            'content' => HomeContent::current(),
            'heroSlides' => HeroSlide::where('is_active', true)->orderBy('order')->get(),
            'features' => HomeFeature::orderBy('order')->get(),
            'steps' => ProcessStep::orderBy('order')->get(),
            'services' => Service::where('is_active', true)->orderBy('order')->get(),
            'sectors' => Sector::orderBy('order')->take(8)->get(),
            'certificates' => Certificate::orderBy('order')->get(),
            'stats' => Stat::orderBy('order')->get(),
            'referenceLogos' => ReferenceLogo::orderBy('order')->get(),
            'featuredProjects' => Project::where('is_featured', true)->orderBy('order')->take(3)->get(),
            'faqs' => Faq::where('is_active', true)->orderBy('order')->get(),
        ]);
    }
}
