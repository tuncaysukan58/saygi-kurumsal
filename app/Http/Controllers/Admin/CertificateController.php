<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\HandlesUploads;
use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CertificateController extends Controller
{
    use HandlesUploads;

    public function index(): View
    {
        return view('admin.certificates.index', ['certificates' => Certificate::orderBy('order')->get()]);
    }

    public function create(): View
    {
        return view('admin.certificates.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['image'] = $request->file('image') ? $this->storeImage($request->file('image'), 'certificates') : null;

        Certificate::create($data);

        return redirect()->route('admin.certificates.index')->with('status', 'Belge eklendi.');
    }

    public function edit(Certificate $certificate): View
    {
        return view('admin.certificates.edit', ['certificate' => $certificate]);
    }

    public function update(Request $request, Certificate $certificate): RedirectResponse
    {
        $data = $this->validated($request);
        $data['image'] = $this->replaceImage($certificate->image, $request->file('image'), 'certificates');

        $certificate->update($data);

        return redirect()->route('admin.certificates.index')->with('status', 'Belge güncellendi.');
    }

    public function destroy(Certificate $certificate): RedirectResponse
    {
        $this->deleteImage($certificate->image);
        $certificate->delete();

        return back()->with('status', 'Belge silindi.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'order' => ['nullable', 'integer'],
            'image' => ['nullable', 'image', 'max:4096'],
        ]);
    }
}
