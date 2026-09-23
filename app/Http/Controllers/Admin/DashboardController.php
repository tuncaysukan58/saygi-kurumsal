<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\JobApplication;
use App\Models\QuoteRequest;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'newQuoteCount' => QuoteRequest::where('status', 'new')->count(),
            'newContactCount' => ContactMessage::where('status', 'new')->count(),
            'newApplicationCount' => JobApplication::where('status', 'new')->count(),
            'latestQuotes' => QuoteRequest::latest()->take(5)->get(),
            'latestContacts' => ContactMessage::latest()->take(5)->get(),
            'latestApplications' => JobApplication::latest()->take(5)->get(),
        ]);
    }
}
