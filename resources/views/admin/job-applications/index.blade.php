@php
    $statusLabels = ['new' => 'Yeni', 'reviewed' => 'İncelendi', 'contacted' => 'Görüşüldü', 'rejected' => 'Reddedildi'];
@endphp
<x-admin-layout title="Kariyer Başvuruları">
    <div class="flex justify-between items-center mb-5">
        <p class="text-slate-500 text-sm">Kariyer sayfasındaki başvuru formundan gelen kayıtlar.</p>
        <form method="GET" class="text-sm">
            <select name="status" onchange="this.form.submit()" class="rounded-md border-slate-300">
                <option value="">Tüm Durumlar</option>
                @foreach ($statusLabels as $key => $label)
                    <option value="{{ $key }}" @selected(request('status') === $key)>{{ $label }}</option>
                @endforeach
            </select>
        </form>
    </div>
    <div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-500 text-left">
                <tr><th class="px-4 py-3">Ad Soyad</th><th class="px-4 py-3">Pozisyon</th><th class="px-4 py-3">Telefon</th><th class="px-4 py-3">Durum</th><th class="px-4 py-3">Tarih</th><th class="px-4 py-3"></th></tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($applications as $application)
                    <tr>
                        <td class="px-4 py-3 font-medium">{{ $application->name }}</td>
                        <td class="px-4 py-3">{{ $application->jobPosting->title ?? $application->department ?? 'Genel Başvuru' }}</td>
                        <td class="px-4 py-3">{{ $application->phone }}</td>
                        <td class="px-4 py-3">{{ $statusLabels[$application->status] ?? $application->status }}</td>
                        <td class="px-4 py-3">{{ $application->created_at->format('d.m.Y') }}</td>
                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('admin.job-applications.show', $application) }}" class="text-blue-600">İncele</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-4 py-6 text-center text-slate-400">Henüz başvuru yok.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $applications->links() }}</div>
</x-admin-layout>
