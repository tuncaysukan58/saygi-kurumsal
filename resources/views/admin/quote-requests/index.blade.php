@php $statusLabels = ['new' => 'Yeni', 'contacted' => 'Görüşüldü', 'closed' => 'Kapandı']; @endphp
<x-admin-layout title="Teklif Talepleri">
    <div class="flex justify-between items-center mb-5">
        <p class="text-slate-500 text-sm">Anasayfadaki "Hızlı Teklif" formundan gelen talepler.</p>
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
                <tr><th class="px-4 py-3">Ad Soyad</th><th class="px-4 py-3">Hizmet</th><th class="px-4 py-3">Telefon</th><th class="px-4 py-3">Durum</th><th class="px-4 py-3">Tarih</th><th class="px-4 py-3"></th></tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($requests as $quoteRequest)
                    <tr>
                        <td class="px-4 py-3 font-medium">{{ $quoteRequest->name }}</td>
                        <td class="px-4 py-3">{{ $quoteRequest->service }}</td>
                        <td class="px-4 py-3">{{ $quoteRequest->phone }}</td>
                        <td class="px-4 py-3">{{ $statusLabels[$quoteRequest->status] ?? $quoteRequest->status }}</td>
                        <td class="px-4 py-3">{{ $quoteRequest->created_at->format('d.m.Y') }}</td>
                        <td class="px-4 py-3 text-right"><a href="{{ route('admin.quote-requests.show', $quoteRequest) }}" class="text-blue-600">İncele</a></td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-4 py-6 text-center text-slate-400">Henüz talep yok.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $requests->links() }}</div>
</x-admin-layout>
