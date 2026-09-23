<x-admin-layout title="Hizmetler">
    <div class="flex justify-between items-center mb-5">
        <p class="text-slate-500 text-sm">Anasayfa ve hizmetler sayfasında listelenen hizmetler.</p>
        <a href="{{ route('admin.services.create') }}" class="bg-slate-800 text-white text-sm px-4 py-2 rounded-lg">+ Yeni Hizmet</a>
    </div>

    <div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-500 text-left">
                <tr>
                    <th class="px-4 py-3">Sıra</th>
                    <th class="px-4 py-3">Başlık</th>
                    <th class="px-4 py-3">Alt Hizmet</th>
                    <th class="px-4 py-3">Durum</th>
                    <th class="px-4 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($services as $service)
                    <tr>
                        <td class="px-4 py-3">{{ $service->order }}</td>
                        <td class="px-4 py-3 font-medium">{{ $service->title }}</td>
                        <td class="px-4 py-3">{{ $service->items->count() }}</td>
                        <td class="px-4 py-3">
                            @if ($service->is_active)
                                <span class="text-emerald-600">Aktif</span>
                            @else
                                <span class="text-slate-400">Pasif</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-right space-x-3">
                            <a href="{{ route('admin.services.edit', $service) }}" class="text-blue-600">Düzenle</a>
                            <form method="POST" action="{{ route('admin.services.destroy', $service) }}" class="inline" onsubmit="return confirm('Silinsin mi?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600">Sil</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-4 py-6 text-center text-slate-400">Henüz hizmet eklenmedi.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin-layout>
