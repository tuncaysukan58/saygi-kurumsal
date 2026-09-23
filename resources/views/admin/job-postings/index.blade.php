<x-admin-layout title="Açık Pozisyonlar">
    <div class="flex justify-between items-center mb-5">
        <p class="text-slate-500 text-sm">Kariyer sayfasında listelenir.</p>
        <a href="{{ route('admin.job-postings.create') }}" class="bg-slate-800 text-white text-sm px-4 py-2 rounded-lg">+ Yeni İlan</a>
    </div>
    <div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-500 text-left">
                <tr><th class="px-4 py-3">Pozisyon</th><th class="px-4 py-3">Departman</th><th class="px-4 py-3">Başvuru</th><th class="px-4 py-3">Durum</th><th class="px-4 py-3"></th></tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($postings as $posting)
                    <tr>
                        <td class="px-4 py-3 font-medium">{{ $posting->title }}</td>
                        <td class="px-4 py-3">{{ $posting->department }}</td>
                        <td class="px-4 py-3">{{ $posting->applications_count }}</td>
                        <td class="px-4 py-3">{{ $posting->is_active ? 'Açık' : 'Kapalı' }}</td>
                        <td class="px-4 py-3 text-right space-x-3">
                            <a href="{{ route('admin.job-postings.edit', $posting) }}" class="text-blue-600">Düzenle</a>
                            <form method="POST" action="{{ route('admin.job-postings.destroy', $posting) }}" class="inline" onsubmit="return confirm('Silinsin mi?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600">Sil</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-4 py-6 text-center text-slate-400">Henüz ilan eklenmedi.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin-layout>
