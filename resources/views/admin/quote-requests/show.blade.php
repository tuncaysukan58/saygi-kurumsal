<x-admin-layout title="Teklif Talebi Detayı">
    <div class="bg-white rounded-xl border border-slate-200 p-6 max-w-2xl space-y-4">
        <div class="grid grid-cols-2 gap-4 text-sm">
            <div><span class="text-slate-400">Ad Soyad</span><div class="font-medium">{{ $quoteRequest->name }}</div></div>
            <div><span class="text-slate-400">Telefon</span><div class="font-medium">{{ $quoteRequest->phone }}</div></div>
            <div><span class="text-slate-400">E-posta</span><div class="font-medium">{{ $quoteRequest->email ?? '—' }}</div></div>
            <div><span class="text-slate-400">Hizmet</span><div class="font-medium">{{ $quoteRequest->service ?? '—' }}</div></div>
            <div><span class="text-slate-400">Sektör</span><div class="font-medium">{{ $quoteRequest->sector ?? '—' }}</div></div>
            <div><span class="text-slate-400">Şehir</span><div class="font-medium">{{ $quoteRequest->city ?? '—' }}</div></div>
            <div><span class="text-slate-400">Personel İhtiyacı</span><div class="font-medium">{{ $quoteRequest->staff_need ?? '—' }}</div></div>
            <div><span class="text-slate-400">Tarih</span><div class="font-medium">{{ $quoteRequest->created_at->format('d.m.Y H:i') }}</div></div>
        </div>
        <div>
            <span class="text-slate-400 text-sm">Mesaj</span>
            <p class="mt-1 text-sm whitespace-pre-line">{{ $quoteRequest->message ?: '—' }}</p>
        </div>

        <form method="POST" action="{{ route('admin.quote-requests.update', $quoteRequest) }}" class="flex items-center gap-3 pt-4 border-t border-slate-100">
            @csrf @method('PUT')
            <select name="status" class="rounded-md border-slate-300 text-sm">
                @foreach (['new' => 'Yeni', 'contacted' => 'Görüşüldü', 'closed' => 'Kapandı'] as $key => $label)
                    <option value="{{ $key }}" @selected($quoteRequest->status === $key)>{{ $label }}</option>
                @endforeach
            </select>
            <x-primary-button>Durumu Güncelle</x-primary-button>
        </form>

        <form method="POST" action="{{ route('admin.quote-requests.destroy', $quoteRequest) }}" onsubmit="return confirm('Silinsin mi?')">
            @csrf @method('DELETE')
            <button class="text-sm text-red-600">Talebi Sil</button>
        </form>

        <a href="{{ route('admin.quote-requests.index') }}" class="block text-sm text-slate-500">← Listeye Dön</a>
    </div>
</x-admin-layout>
