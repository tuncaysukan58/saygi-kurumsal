<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesUploads;
use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogPostController extends Controller
{
    use HandlesUploads;

    public function index(): View
    {
        return view('admin.blog-posts.index', ['posts' => BlogPost::with('category')->latest('published_at')->get()]);
    }

    public function create(): View
    {
        return view('admin.blog-posts.create', ['categories' => BlogCategory::orderBy('name')->get()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['cover_image'] = $request->file('cover_image') ? $this->storeImage($request->file('cover_image'), 'blog') : null;
        $data['is_published'] = $request->boolean('is_published');
        $data['published_at'] = $data['is_published'] ? ($data['published_at'] ?? now()) : null;

        BlogPost::create($data);

        return redirect()->route('admin.blog-posts.index')->with('status', 'Blog yazısı oluşturuldu.');
    }

    public function edit(BlogPost $blogPost): View
    {
        return view('admin.blog-posts.edit', ['post' => $blogPost, 'categories' => BlogCategory::orderBy('name')->get()]);
    }

    public function update(Request $request, BlogPost $blogPost): RedirectResponse
    {
        $data = $this->validated($request);
        $data['cover_image'] = $this->replaceImage($blogPost->cover_image, $request->file('cover_image'), 'blog');
        $data['is_published'] = $request->boolean('is_published');
        $data['published_at'] = $data['is_published'] ? ($data['published_at'] ?? $blogPost->published_at ?? now()) : null;

        $blogPost->update($data);

        return redirect()->route('admin.blog-posts.index')->with('status', 'Blog yazısı güncellendi.');
    }

    public function destroy(BlogPost $blogPost): RedirectResponse
    {
        $this->deleteImage($blogPost->cover_image);
        $blogPost->delete();

        return back()->with('status', 'Blog yazısı silindi.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'blog_category_id' => ['nullable', 'exists:blog_categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'content' => ['nullable', 'string'],
            'published_at' => ['nullable', 'date'],
            'cover_image' => ['nullable', 'image', 'max:4096'],
            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string', 'max:500'],
            'seo_keywords' => ['nullable', 'string', 'max:255'],
        ]);
    }
}
