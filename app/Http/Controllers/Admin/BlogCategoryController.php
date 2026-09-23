<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogCategoryController extends Controller
{
    public function index(): View
    {
        return view('admin.blog-categories.index', ['categories' => BlogCategory::orderBy('name')->withCount('posts')->get()]);
    }

    public function create(): View
    {
        return view('admin.blog-categories.create');
    }

    public function store(Request $request): RedirectResponse
    {
        BlogCategory::create($request->validate(['name' => ['required', 'string', 'max:255']]));

        return redirect()->route('admin.blog-categories.index')->with('status', 'Kategori eklendi.');
    }

    public function edit(BlogCategory $blogCategory): View
    {
        return view('admin.blog-categories.edit', ['category' => $blogCategory]);
    }

    public function update(Request $request, BlogCategory $blogCategory): RedirectResponse
    {
        $blogCategory->update($request->validate(['name' => ['required', 'string', 'max:255']]));

        return redirect()->route('admin.blog-categories.index')->with('status', 'Kategori güncellendi.');
    }

    public function destroy(BlogCategory $blogCategory): RedirectResponse
    {
        $blogCategory->delete();

        return back()->with('status', 'Kategori silindi.');
    }
}
