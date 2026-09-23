<x-admin-layout title="Sektörler">
    <div class="flex justify-between items-center mb-5">
        <p class="text-slate-500 text-sm">Sektörler sayfasında ve anasayfada listelenir.</p>
        <a href="{{ route('admin.sectors.create') }}" class="bg-slate-800 text-white text-sm px-4 py-2 rounded-lg">+ Yeni Sektör</a>
    </div>
    <div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-500 text-left">
                <tr><th class="px-4 py-3">Sıra</th><th class="px-4 py-3">Başlık</th><th class="px-4 py-3"></th></tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($sectors as $sector)
                    <tr>
                        <td class="px-4 py-3">{{ $sector->order }}</td>
                        <td class="px-4 py-3 font-medium">{{ $sector->icon }} {{ $sector->title }}</td>
                        <td class="px-4 py-3 text-right space-x-3">
                            <a href="{{ route('admin.sectors.edit', $sector) }}" class="text-blue-600">Düzenle</a>
                            <form method="POST" action="{{ route('admin.sectors.destroy', $sector) }}" class="inline" onsubmit="return confirm('Silinsin mi?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600">Sil</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="px-4 py-6 text-center text-slate-400">Henüz sektör eklenmedi.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin-layout>
