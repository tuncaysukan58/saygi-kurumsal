<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeFeature;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HomeFeatureController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'icon' => ['nullable', 'string', 'max:10'],
            'title' => ['required', 'string', 'max:255'],
            'order' => ['nullable', 'integer'],
        ]);

        HomeFeature::create($data);

        return back()->with('status', 'Özellik eklendi.');
    }

    public function update(Request $request, HomeFeature $homeFeature): RedirectResponse
    {
        $data = $request->validate([
            'icon' => ['nullable', 'string', 'max:10'],
            'title' => ['required', 'string', 'max:255'],
            'order' => ['nullable', 'integer'],
        ]);

        $homeFeature->update($data);

        return back()->with('status', 'Özellik güncellendi.');
    }

    public function destroy(HomeFeature $homeFeature): RedirectResponse
    {
        $homeFeature->delete();

        return back()->with('status', 'Özellik silindi.');
    }
}
