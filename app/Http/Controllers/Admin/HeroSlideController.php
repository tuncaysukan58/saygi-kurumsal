<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesUploads;
use App\Http\Controllers\Controller;
use App\Models\HeroSlide;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HeroSlideController extends Controller
{
    use HandlesUploads;

    public function index(): View
    {
        return view('admin.hero-slides.index', ['slides' => HeroSlide::orderBy('order')->get()]);
    }

    public function create(): View
    {
        return view('admin.hero-slides.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['image'] = $request->file('image') ? $this->storeImage($request->file('image'), 'hero-slides') : null;
        $data['is_active'] = $request->boolean('is_active');

        HeroSlide::create($data);

        return redirect()->route('admin.hero-slides.index')->with('status', 'Slayt oluşturuldu.');
    }

    public function edit(HeroSlide $heroSlide): View
    {
        return view('admin.hero-slides.edit', ['slide' => $heroSlide]);
    }

    public function update(Request $request, HeroSlide $heroSlide): RedirectResponse
    {
        $data = $this->validated($request);
        $data['image'] = $this->replaceImage($heroSlide->image, $request->file('image'), 'hero-slides');
        $data['is_active'] = $request->boolean('is_active');

        $heroSlide->update($data);

        return redirect()->route('admin.hero-slides.index')->with('status', 'Slayt güncellendi.');
    }

    public function destroy(HeroSlide $heroSlide): RedirectResponse
    {
        $this->deleteImage($heroSlide->image);
        $heroSlide->delete();

        return back()->with('status', 'Slayt silindi.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'eyebrow' => ['nullable', 'string', 'max:255'],
            'title' => ['nullable', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:1000'],
            'primary_btn_text' => ['nullable', 'string', 'max:100'],
            'primary_btn_url' => ['nullable', 'string', 'max:255'],
            'secondary_btn_text' => ['nullable', 'string', 'max:100'],
            'secondary_btn_url' => ['nullable', 'string', 'max:255'],
            'order' => ['nullable', 'integer'],
            'image' => ['nullable', 'image', 'max:4096'],
        ]);
    }
}
