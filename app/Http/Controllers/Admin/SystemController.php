<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;
use Illuminate\View\View;

class SystemController extends Controller
{
    public function index(): View
    {
        Artisan::call('migrate:status');

        return view('admin.system.index', [
            'migrateStatus' => Artisan::output(),
            'hasDemoData' => Service::query()->exists(),
            'storageLinked' => file_exists(public_path('storage')),
        ]);
    }

    public function storageLink(): RedirectResponse
    {
        try {
            Artisan::call('storage:link', ['--force' => true]);

            return redirect()->route('admin.system.index')
                ->with('status', 'Depolama bağlantısı (storage:link) oluşturuldu.')
                ->with('output', Artisan::output());
        } catch (\Throwable $e) {
            return redirect()->route('admin.system.index')
                ->with('status', 'Bağlantı oluşturulamadı (hosting sembolik bağlantıya izin vermiyor olabilir). Önemli değil: görseller sitede zaten çalışmalı, aşağıdaki nota bakın.')
                ->with('output', 'Hata: '.$e->getMessage());
        }
    }

    public function migrate(): RedirectResponse
    {
        Artisan::call('migrate', ['--force' => true]);

        return redirect()->route('admin.system.index')
            ->with('status', 'Migration çalıştırıldı.')
            ->with('output', Artisan::output());
    }

    public function seed(): RedirectResponse
    {
        Artisan::call('db:seed', ['--force' => true]);

        return redirect()->route('admin.system.index')
            ->with('status', 'Seeder çalıştırıldı.')
            ->with('output', Artisan::output());
    }

    public function clearCache(): RedirectResponse
    {
        Artisan::call('optimize:clear');

        return redirect()->route('admin.system.index')
            ->with('status', 'Önbellek temizlendi.')
            ->with('output', Artisan::output());
    }
}
