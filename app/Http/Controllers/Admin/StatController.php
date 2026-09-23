<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stat;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StatController extends Controller
{
    public function index(): View
    {
        return view('admin.stats.index', ['stats' => Stat::orderBy('order')->get()]);
    }

    public function create(): View
    {
        return view('admin.stats.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Stat::create($this->validated($request));

        return redirect()->route('admin.stats.index')->with('status', 'Rakam eklendi.');
    }

    public function edit(Stat $stat): View
    {
        return view('admin.stats.edit', ['stat' => $stat]);
    }

    public function update(Request $request, Stat $stat): RedirectResponse
    {
        $stat->update($this->validated($request));

        return redirect()->route('admin.stats.index')->with('status', 'Rakam güncellendi.');
    }

    public function destroy(Stat $stat): RedirectResponse
    {
        $stat->delete();

        return back()->with('status', 'Rakam silindi.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'label' => ['required', 'string', 'max:255'],
            'value' => ['required', 'string', 'max:50'],
            'icon' => ['nullable', 'string', 'max:10'],
            'order' => ['nullable', 'integer'],
        ]);
    }
}
