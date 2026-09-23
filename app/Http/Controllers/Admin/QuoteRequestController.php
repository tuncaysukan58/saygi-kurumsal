<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuoteRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuoteRequestController extends Controller
{
    public function index(Request $request): View
    {
        return view('admin.quote-requests.index', [
            'requests' => QuoteRequest::when($request->status, fn ($q) => $q->where('status', $request->status))
                ->latest()->paginate(20)->withQueryString(),
        ]);
    }

    public function show(QuoteRequest $quoteRequest): View
    {
        return view('admin.quote-requests.show', ['quoteRequest' => $quoteRequest]);
    }

    public function update(Request $request, QuoteRequest $quoteRequest): RedirectResponse
    {
        $quoteRequest->update($request->validate([
            'status' => ['required', 'in:new,contacted,closed'],
        ]));

        return back()->with('status', 'Durum güncellendi.');
    }

    public function destroy(QuoteRequest $quoteRequest): RedirectResponse
    {
        $quoteRequest->delete();

        return redirect()->route('admin.quote-requests.index')->with('status', 'Talep silindi.');
    }
}
