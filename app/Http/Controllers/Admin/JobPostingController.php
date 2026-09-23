<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobPosting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobPostingController extends Controller
{
    public function index(): View
    {
        return view('admin.job-postings.index', ['postings' => JobPosting::withCount('applications')->orderBy('order')->get()]);
    }

    public function create(): View
    {
        return view('admin.job-postings.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['is_active'] = $request->boolean('is_active');

        JobPosting::create($data);

        return redirect()->route('admin.job-postings.index')->with('status', 'İlan oluşturuldu.');
    }

    public function edit(JobPosting $jobPosting): View
    {
        return view('admin.job-postings.edit', ['posting' => $jobPosting]);
    }

    public function update(Request $request, JobPosting $jobPosting): RedirectResponse
    {
        $data = $this->validated($request);
        $data['is_active'] = $request->boolean('is_active');

        $jobPosting->update($data);

        return redirect()->route('admin.job-postings.index')->with('status', 'İlan güncellendi.');
    }

    public function destroy(JobPosting $jobPosting): RedirectResponse
    {
        $jobPosting->delete();

        return back()->with('status', 'İlan silindi.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'department' => ['nullable', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
            'employment_type' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'order' => ['nullable', 'integer'],
        ]);
    }
}
