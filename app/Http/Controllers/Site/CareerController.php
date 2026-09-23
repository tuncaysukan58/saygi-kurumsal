<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\StoreJobApplicationRequest;
use App\Mail\NewLeadNotification;
use App\Models\JobApplication;
use App\Models\JobPosting;
use App\Models\Setting;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class CareerController extends Controller
{
    public function index(): View
    {
        return view('site.career', [
            'postings' => JobPosting::where('is_active', true)->orderBy('order')->get(),
        ]);
    }

    public function apply(StoreJobApplicationRequest $request): JsonResponse
    {
        if ($request->filled('website')) {
            return response()->json(['message' => 'Başvurunuz alındı.']);
        }

        $data = $request->validated();
        $data['cv_path'] = $request->file('cv')->store('cv', 'local');
        unset($data['cv']);

        $application = JobApplication::create($data);

        $to = Setting::current()->email;
        if ($to) {
            Mail::to($to)->send(new NewLeadNotification('Yeni Kariyer Başvurusu', [
                'Ad Soyad' => $application->name,
                'Telefon' => $application->phone,
                'E-posta' => $application->email,
                'Departman' => $application->department,
                'Ön Yazı' => $application->message,
            ]));
        }

        return response()->json(['message' => 'Başvurunuz başarıyla alındı. En kısa sürede sizinle iletişime geçeceğiz.']);
    }
}
