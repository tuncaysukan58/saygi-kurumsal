<x-admin-layout title="Projeler">
    <div class="flex justify-between items-center mb-5">
        <p class="text-slate-500 text-sm">Projeler / başarı hikâyeleri sayfasında listelenir.</p>
        <a href="{{ route('admin.projects.create') }}" class="bg-slate-800 text-white text-sm px-4 py-2 rounded-lg">+ Yeni Proje</a>
    </div>
    <div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-500 text-left">
                <tr><th class="px-4 py-3">Sıra</th><th class="px-4 py-3">Başlık</th><th class="px-4 py-3">Sektör</th><th class="px-4 py-3">Öne Çıkan</th><th class="px-4 py-3"></th></tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($projects as $project)
                    <tr>
                        <td class="px-4 py-3">{{ $project->order }}</td>
                        <td class="px-4 py-3 font-medium">{{ $project->title }}</td>
                        <td class="px-4 py-3">{{ $project->sector->title ?? '—' }}</td>
                        <td class="px-4 py-3">{{ $project->is_featured ? 'Evet' : '—' }}</td>
                        <td class="px-4 py-3 text-right space-x-3">
                            <a href="{{ route('admin.projects.edit', $project) }}" class="text-blue-600">Düzenle</a>
                            <form method="POST" action="{{ route('admin.projects.destroy', $project) }}" class="inline" onsubmit="return confirm('Silinsin mi?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600">Sil</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-4 py-6 text-center text-slate-400">Henüz proje eklenmedi.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin-layout>
