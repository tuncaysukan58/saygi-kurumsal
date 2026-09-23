<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesUploads;
use App\Http\Controllers\Controller;
use App\Models\ReferenceLogo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReferenceLogoController extends Controller
{
    use HandlesUploads;

    public function index(): View
    {
        return view('admin.reference-logos.index', ['logos' => ReferenceLogo::orderBy('order')->get()]);
    }

    public function create(): View
    {
        return view('admin.reference-logos.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request, true);
        $data['logo'] = $this->storeImage($request->file('logo'), 'reference-logos');

        ReferenceLogo::create($data);

        return redirect()->route('admin.reference-logos.index')->with('status', 'Referans logosu eklendi.');
    }

    public function edit(ReferenceLogo $referenceLogo): View
    {
        return view('admin.reference-logos.edit', ['logo' => $referenceLogo]);
    }

    public function update(Request $request, ReferenceLogo $referenceLogo): RedirectResponse
    {
        $data = $this->validated($request, false);
        $data['logo'] = $this->replaceImage($referenceLogo->logo, $request->file('logo'), 'reference-logos');

        $referenceLogo->update($data);

        return redirect()->route('admin.reference-logos.index')->with('status', 'Referans logosu güncellendi.');
    }

    public function destroy(ReferenceLogo $referenceLogo): RedirectResponse
    {
        $this->deleteImage($referenceLogo->logo);
        $referenceLogo->delete();

        return back()->with('status', 'Referans logosu silindi.');
    }

    private function validated(Request $request, bool $logoRequired): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'url' => ['nullable', 'url', 'max:255'],
            'order' => ['nullable', 'integer'],
            'logo' => [$logoRequired ? 'required' : 'nullable', 'image', 'max:2048'],
        ]);
    }
}
