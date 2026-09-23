<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageSection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PageSectionController extends Controller
{
    public function store(Request $request, Page $page): RedirectResponse
    {
        $data = $this->validated($request);
        $data['page_id'] = $page->id;

        PageSection::create($data);

        return back()->with('status', 'Bölüm eklendi.');
    }

    public function update(Request $request, PageSection $pageSection): RedirectResponse
    {
        $pageSection->update($this->validated($request));

        return back()->with('status', 'Bölüm güncellendi.');
    }

    public function destroy(PageSection $pageSection): RedirectResponse
    {
        $pageSection->delete();

        return back()->with('status', 'Bölüm silindi.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'anchor' => ['nullable', 'string', 'max:100'],
            'title' => ['required', 'string', 'max:255'],
            'content' => ['nullable', 'string'],
            'order' => ['nullable', 'integer'],
        ]);
    }
}
