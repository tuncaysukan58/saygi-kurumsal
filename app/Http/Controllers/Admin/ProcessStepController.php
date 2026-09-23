<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProcessStep;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProcessStepController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:500'],
            'order' => ['nullable', 'integer'],
        ]);

        ProcessStep::create($data);

        return back()->with('status', 'Süreç adımı eklendi.');
    }

    public function update(Request $request, ProcessStep $processStep): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:500'],
            'order' => ['nullable', 'integer'],
        ]);

        $processStep->update($data);

        return back()->with('status', 'Süreç adımı güncellendi.');
    }

    public function destroy(ProcessStep $processStep): RedirectResponse
    {
        $processStep->delete();

        return back()->with('status', 'Süreç adımı silindi.');
    }
}
