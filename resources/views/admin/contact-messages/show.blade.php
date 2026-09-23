<x-admin-layout title="Mesaj Detayı">
    <div class="bg-white rounded-xl border border-slate-200 p-6 max-w-2xl space-y-4">
        <div class="grid grid-cols-2 gap-4 text-sm">
            <div><span class="text-slate-400">Ad Soyad</span><div class="font-medium">{{ $message->name }}</div></div>
            <div><span class="text-slate-400">Firma</span><div class="font-medium">{{ $message->company ?? '—' }}</div></div>
            <div><span class="text-slate-400">Telefon</span><div class="font-medium">{{ $message->phone }}</div></div>
            <div><span class="text-slate-400">E-posta</span><div class="font-medium">{{ $message->email }}</div></div>
            <div><span class="text-slate-400">Hizmet</span><div class="font-medium">{{ $message->service ?? '—' }}</div></div>
            <div><span class="text-slate-400">Tarih</span><div class="font-medium">{{ $message->created_at->format('d.m.Y H:i') }}</div></div>
        </div>
        <div>
            <span class="text-slate-400 text-sm">Mesaj</span>
            <p class="mt-1 text-sm whitespace-pre-line">{{ $message->message }}</p>
        </div>

        <form method="POST" action="{{ route('admin.contact-messages.update', $message) }}" class="flex items-center gap-3 pt-4 border-t border-slate-100">
            @csrf @method('PUT')
            <select name="status" class="rounded-md border-slate-300 text-sm">
                @foreach (['new' => 'Yeni', 'contacted' => 'Görüşüldü', 'closed' => 'Kapandı'] as $key => $label)
                    <option value="{{ $key }}" @selected($message->status === $key)>{{ $label }}</option>
                @endforeach
            </select>
            <x-primary-button>Durumu Güncelle</x-primary-button>
        </form>

        <form method="POST" action="{{ route('admin.contact-messages.destroy', $message) }}" onsubmit="return confirm('Silinsin mi?')">
            @csrf @method('DELETE')
            <button class="text-sm text-red-600">Mesajı Sil</button>
        </form>

        <a href="{{ route('admin.contact-messages.index') }}" class="block text-sm text-slate-500">← Listeye Dön</a>
    </div>
</x-admin-layout>
