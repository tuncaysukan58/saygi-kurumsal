<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesUploads;
use App\Http\Controllers\Controller;
use App\Models\Sector;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SectorController extends Controller
{
    use HandlesUploads;

    public function index(): View
    {
        return view('admin.sectors.index', ['sectors' => Sector::orderBy('order')->get()]);
    }

    public function create(): View
    {
        return view('admin.sectors.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['icon_image'] = $request->file('icon_image')
            ? $this->storeImage($request->file('icon_image'), 'sectors')
            : null;

        Sector::create($data);

        return redirect()->route('admin.sectors.index')->with('status', 'Sektör oluşturuldu.');
    }

    public function edit(Sector $sector): View
    {
        return view('admin.sectors.edit', ['sector' => $sector]);
    }

    public function update(Request $request, Sector $sector): RedirectResponse
    {
        $data = $this->validated($request);
        $data['icon_image'] = $this->replaceImage($sector->icon_image, $request->file('icon_image'), 'sectors');

        $sector->update($data);

        return redirect()->route('admin.sectors.index')->with('status', 'Sektör güncellendi.');
    }

    public function destroy(Sector $sector): RedirectResponse
    {
        $this->deleteImage($sector->icon_image);
        $sector->delete();

        return back()->with('status', 'Sektör silindi.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title'           => ['required', 'string', 'max:255'],
            'icon'            => ['nullable', 'string', 'max:10'],
            'description'     => ['nullable', 'string', 'max:1000'],
            'order'           => ['nullable', 'integer'],
            'icon_image'      => ['nullable', 'image', 'max:2048'],
            'seo_title'       => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string', 'max:320'],
            'seo_keywords'    => ['nullable', 'string', 'max:255'],
        ]);
    }
}
