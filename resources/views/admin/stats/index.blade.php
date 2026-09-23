<x-admin-layout title="Rakamlarla SAY">
    <div class="flex justify-between items-center mb-5">
        <p class="text-slate-500 text-sm">Anasayfada "Rakamlarla SAY Kurumsal" bölümünde gösterilir.</p>
        <a href="{{ route('admin.stats.create') }}" class="bg-slate-800 text-white text-sm px-4 py-2 rounded-lg">+ Yeni Rakam</a>
    </div>
    <div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-500 text-left">
                <tr><th class="px-4 py-3">Sıra</th><th class="px-4 py-3">Değer</th><th class="px-4 py-3">Etiket</th><th class="px-4 py-3"></th></tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($stats as $stat)
                    <tr>
                        <td class="px-4 py-3">{{ $stat->order }}</td>
                        <td class="px-4 py-3 font-medium">{{ $stat->value }}</td>
                        <td class="px-4 py-3">{{ $stat->label }}</td>
                        <td class="px-4 py-3 text-right space-x-3">
                            <a href="{{ route('admin.stats.edit', $stat) }}" class="text-blue-600">Düzenle</a>
                            <form method="POST" action="{{ route('admin.stats.destroy', $stat) }}" class="inline" onsubmit="return confirm('Silinsin mi?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600">Sil</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="px-4 py-6 text-center text-slate-400">Henüz rakam eklenmedi.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin-layout>
