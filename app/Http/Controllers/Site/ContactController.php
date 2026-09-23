<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\StoreContactMessageRequest;
use App\Http\Requests\Site\StoreQuoteRequestRequest;
use App\Mail\NewLeadNotification;
use App\Models\ContactMessage;
use App\Models\QuoteRequest;
use App\Models\Setting;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('site.contact');
    }

    public function send(StoreContactMessageRequest $request): JsonResponse
    {
        if ($request->filled('website')) {
            return response()->json(['message' => 'Talebiniz alındı.']);
        }

        $message = ContactMessage::create($request->validated());

        $this->notifyAdmin('Yeni İletişim Mesajı', [
            'Ad Soyad' => $message->name,
            'Firma' => $message->company,
            'Telefon' => $message->phone,
            'E-posta' => $message->email,
            'Hizmet' => $message->service,
            'Mesaj' => $message->message,
        ]);

        return response()->json(['message' => 'Mesajınız başarıyla alındı. En kısa sürede sizinle iletişime geçeceğiz.']);
    }

    public function quote(StoreQuoteRequestRequest $request): JsonResponse
    {
        if ($request->filled('website')) {
            return response()->json(['message' => 'Talebiniz alındı.']);
        }

        $quote = QuoteRequest::create($request->validated());

        $this->notifyAdmin('Yeni Teklif Talebi', [
            'Ad Soyad' => $quote->name,
            'Telefon' => $quote->phone,
            'E-posta' => $quote->email,
            'Hizmet' => $quote->service,
            'Sektör' => $quote->sector,
            'Şehir' => $quote->city,
            'Personel İhtiyacı' => $quote->staff_need,
            'Mesaj' => $quote->message,
        ]);

        return response()->json(['message' => 'Teklif talebiniz başarıyla alındı. En kısa sürede sizinle iletişime geçeceğiz.']);
    }

    private function notifyAdmin(string $subject, array $lines): void
    {
        $to = Setting::current()->email;

        if ($to) {
            Mail::to($to)->send(new NewLeadNotification($subject, $lines));
        }
    }
}
