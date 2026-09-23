<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class JobApplicationController extends Controller
{
    public function index(Request $request): View
    {
        return view('admin.job-applications.index', [
            'applications' => JobApplication::with('jobPosting')
                ->when($request->status, fn ($q) => $q->where('status', $request->status))
                ->latest()
                ->paginate(20)
                ->withQueryString(),
        ]);
    }

    public function show(JobApplication $jobApplication): View
    {
        return view('admin.job-applications.show', ['application' => $jobApplication->load('jobPosting')]);
    }

    public function update(Request $request, JobApplication $jobApplication): RedirectResponse
    {
        $data = $request->validate([
            'status' => ['required', 'in:new,reviewed,contacted,rejected'],
        ]);

        $jobApplication->update($data);

        return back()->with('status', 'Başvuru durumu güncellendi.');
    }

    public function destroy(JobApplication $jobApplication): RedirectResponse
    {
        if ($jobApplication->cv_path) {
            Storage::disk('local')->delete($jobApplication->cv_path);
        }
        $jobApplication->delete();

        return redirect()->route('admin.job-applications.index')->with('status', 'Başvuru silindi.');
    }

    public function downloadCv(JobApplication $jobApplication): StreamedResponse
    {
        abort_unless($jobApplication->cv_path && Storage::disk('local')->exists($jobApplication->cv_path), 404);

        $extension = pathinfo($jobApplication->cv_path, PATHINFO_EXTENSION);

        return Storage::disk('local')->download($jobApplication->cv_path, $jobApplication->name.'-cv.'.$extension);
    }
}
