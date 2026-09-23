<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesUploads;
use App\Http\Controllers\Controller;
use App\Models\HomeContent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeContentController extends Controller
{
    use HandlesUploads;

    public function edit(): View
    {
        return view('admin.home-content.edit', [
            'content' => HomeContent::current(),
            'features' => \App\Models\HomeFeature::orderBy('order')->get(),
            'steps' => \App\Models\ProcessStep::orderBy('order')->get(),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'about_label' => ['nullable', 'string', 'max:255'],
            'about_title' => ['nullable', 'string', 'max:255'],
            'about_text' => ['nullable', 'string', 'max:2000'],
            'why_label' => ['nullable', 'string', 'max:255'],
            'why_title' => ['nullable', 'string', 'max:255'],
            'why_text' => ['nullable', 'string', 'max:1000'],
            'process_label' => ['nullable', 'string', 'max:255'],
            'process_title' => ['nullable', 'string', 'max:255'],
            'process_text' => ['nullable', 'string', 'max:1000'],
            'about_image' => ['nullable', 'image', 'max:2048'],
            'about_image_secondary' => ['nullable', 'image', 'max:2048'],
        ]);

        $content = HomeContent::current();
        $data['about_image'] = $this->replaceImage($content->about_image, $request->file('about_image'), 'home');
        $data['about_image_secondary'] = $this->replaceImage($content->about_image_secondary, $request->file('about_image_secondary'), 'home');

        $content->update($data);

        return back()->with('status', 'Anasayfa içerikleri güncellendi.');
    }
}
