@php $statusLabels = ['new' => 'Yeni', 'contacted' => 'Görüşüldü', 'closed' => 'Kapandı']; @endphp
<x-admin-layout title="İletişim Mesajları">
    <div class="flex justify-between items-center mb-5">
        <p class="text-slate-500 text-sm">İletişim sayfasındaki formdan gelen mesajlar.</p>
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
                <tr><th class="px-4 py-3">Ad Soyad</th><th class="px-4 py-3">Firma</th><th class="px-4 py-3">Telefon</th><th class="px-4 py-3">Durum</th><th class="px-4 py-3">Tarih</th><th class="px-4 py-3"></th></tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($messages as $message)
                    <tr>
                        <td class="px-4 py-3 font-medium">{{ $message->name }}</td>
                        <td class="px-4 py-3">{{ $message->company }}</td>
                        <td class="px-4 py-3">{{ $message->phone }}</td>
                        <td class="px-4 py-3">{{ $statusLabels[$message->status] ?? $message->status }}</td>
                        <td class="px-4 py-3">{{ $message->created_at->format('d.m.Y') }}</td>
                        <td class="px-4 py-3 text-right"><a href="{{ route('admin.contact-messages.show', $message) }}" class="text-blue-600">İncele</a></td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-4 py-6 text-center text-slate-400">Henüz mesaj yok.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $messages->links() }}</div>
</x-admin-layout>
