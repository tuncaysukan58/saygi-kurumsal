<x-admin-layout title="Sayfalar">
    <div class="flex justify-between items-center mb-5">
        <p class="text-slate-500 text-sm">Kurumsal, Sürdürülebilirlik, KVKK gibi bölümlü sayfalar.</p>
        <a href="{{ route('admin.pages.create') }}" class="bg-slate-800 text-white text-sm px-4 py-2 rounded-lg">+ Yeni Sayfa</a>
    </div>
    <div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-500 text-left">
                <tr><th class="px-4 py-3">Başlık</th><th class="px-4 py-3">Slug</th><th class="px-4 py-3">Bölüm Sayısı</th><th class="px-4 py-3"></th></tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($pages as $page)
                    <tr>
                        <td class="px-4 py-3 font-medium">{{ $page->title }}</td>
                        <td class="px-4 py-3 text-slate-400">/{{ $page->slug }}</td>
                        <td class="px-4 py-3">{{ $page->sections_count }}</td>
                        <td class="px-4 py-3 text-right space-x-3">
                            <a href="{{ route('admin.pages.edit', $page) }}" class="text-blue-600">Düzenle</a>
                            <form method="POST" action="{{ route('admin.pages.destroy', $page) }}" class="inline" onsubmit="return confirm('Silinsin mi?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600">Sil</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="px-4 py-6 text-center text-slate-400">Henüz sayfa eklenmedi.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin-layout>
