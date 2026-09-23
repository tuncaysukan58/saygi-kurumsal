<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesUploads;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Sector;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectController extends Controller
{
    use HandlesUploads;

    public function index(): View
    {
        return view('admin.projects.index', ['projects' => Project::with('sector')->orderBy('order')->get()]);
    }

    public function create(): View
    {
        return view('admin.projects.create', ['sectors' => Sector::orderBy('title')->get()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['cover_image'] = $request->file('cover_image')
            ? $this->storeImage($request->file('cover_image'), 'projects')
            : null;
        $data['is_featured'] = $request->boolean('is_featured');

        Project::create($data);

        return redirect()->route('admin.projects.index')->with('status', 'Proje oluşturuldu.');
    }

    public function edit(Project $project): View
    {
        return view('admin.projects.edit', ['project' => $project, 'sectors' => Sector::orderBy('title')->get()]);
    }

    public function update(Request $request, Project $project): RedirectResponse
    {
        $data = $this->validated($request);
        $data['cover_image'] = $this->replaceImage($project->cover_image, $request->file('cover_image'), 'projects');
        $data['is_featured'] = $request->boolean('is_featured');

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('status', 'Proje güncellendi.');
    }

    public function destroy(Project $project): RedirectResponse
    {
        $this->deleteImage($project->cover_image);
        $project->delete();

        return back()->with('status', 'Proje silindi.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'sector_id' => ['nullable', 'exists:sectors,id'],
            'summary' => ['nullable', 'string', 'max:500'],
            'content' => ['nullable', 'string'],
            'result_metric' => ['nullable', 'string', 'max:255'],
            'order' => ['nullable', 'integer'],
            'cover_image' => ['nullable', 'image', 'max:4096'],
            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string', 'max:500'],
            'seo_keywords' => ['nullable', 'string', 'max:255'],
        ]);
    }
}
