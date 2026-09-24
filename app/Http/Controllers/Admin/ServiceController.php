<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesUploads;
use App\Http\Controllers\Controller;
use App\Models\Sector;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServiceController extends Controller
{
    use HandlesUploads;

    public function index(): View
    {
        return view('admin.services.index', [
            'services' => Service::orderBy('order')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.services.create', [
            'allSectors' => Sector::orderBy('order')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['cover_image'] = $request->file('cover_image')
            ? $this->storeImage($request->file('cover_image'), 'services')
            : null;
        $data['icon_image'] = $request->file('icon_image')
            ? $this->storeImage($request->file('icon_image'), 'services')
            : null;
        $data['is_active'] = $request->boolean('is_active');

        $service = Service::create($data);
        $service->sectors()->sync($this->sectorSyncData($request));

        return redirect()->route('admin.services.edit', $service)->with('status', 'Hizmet oluşturuldu.');
    }

    public function edit(Service $service): View
    {
        return view('admin.services.edit', [
            'service' => $service->load('items', 'sectors'),
            'allSectors' => Sector::orderBy('order')->get(),
        ]);
    }

    public function update(Request $request, Service $service): RedirectResponse
    {
        $data = $this->validated($request);
        $data['cover_image'] = $this->replaceImage($service->cover_image, $request->file('cover_image'), 'services');
        $data['icon_image'] = $this->replaceImage($service->icon_image, $request->file('icon_image'), 'services');
        $data['is_active'] = $request->boolean('is_active');

        $service->update($data);
        $service->sectors()->sync($this->sectorSyncData($request));

        return back()->with('status', 'Hizmet güncellendi.');
    }

    public function destroy(Service $service): RedirectResponse
    {
        $this->deleteImage($service->cover_image);
        $this->deleteImage($service->icon_image);
        $service->delete();

        return redirect()->route('admin.services.index')->with('status', 'Hizmet silindi.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'icon' => ['nullable', 'string', 'max:10'],
            'short_desc' => ['nullable', 'string', 'max:255'],
            'content' => ['nullable', 'string'],
            'order' => ['nullable', 'integer'],
            'cover_image' => ['nullable', 'image', 'max:4096'],
            'icon_image' => ['nullable', 'image', 'max:2048'],
            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string', 'max:500'],
            'seo_keywords' => ['nullable', 'string', 'max:255'],
            'sectors' => ['nullable', 'array'],
            'sectors.*' => ['integer', 'exists:sectors,id'],
            'sector_content' => ['nullable', 'array'],
            'sector_content.*' => ['nullable', 'string'],
        ]);
    }

    /**
     * Build the sync payload for the sectors() pivot, pairing each selected sector
     * with the sector-specific content the admin wrote for it (if any).
     */
    private function sectorSyncData(Request $request): array
    {
        $selectedIds = $request->input('sectors', []);
        $contents = $request->input('sector_content', []);

        $sync = [];
        foreach ($selectedIds as $sectorId) {
            $sync[$sectorId] = ['content' => $contents[$sectorId] ?? null];
        }

        return $sync;
    }
}
