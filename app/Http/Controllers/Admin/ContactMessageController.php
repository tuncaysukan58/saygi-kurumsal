<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactMessageController extends Controller
{
    public function index(Request $request): View
    {
        return view('admin.contact-messages.index', [
            'messages' => ContactMessage::when($request->status, fn ($q) => $q->where('status', $request->status))
                ->latest()->paginate(20)->withQueryString(),
        ]);
    }

    public function show(ContactMessage $contactMessage): View
    {
        return view('admin.contact-messages.show', ['message' => $contactMessage]);
    }

    public function update(Request $request, ContactMessage $contactMessage): RedirectResponse
    {
        $contactMessage->update($request->validate([
            'status' => ['required', 'in:new,contacted,closed'],
        ]));

        return back()->with('status', 'Durum güncellendi.');
    }

    public function destroy(ContactMessage $contactMessage): RedirectResponse
    {
        $contactMessage->delete();

        return redirect()->route('admin.contact-messages.index')->with('status', 'Mesaj silindi.');
    }
}
