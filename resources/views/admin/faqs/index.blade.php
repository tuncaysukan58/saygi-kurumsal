<x-admin-layout title="Sıkça Sorulan Sorular">
    <div class="flex justify-between items-center mb-5">
        <p class="text-slate-500 text-sm">Anasayfada SSS bölümünde gösterilir.</p>
        <a href="{{ route('admin.faqs.create') }}" class="bg-slate-800 text-white text-sm px-4 py-2 rounded-lg">+ Yeni Soru</a>
    </div>
    <div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-500 text-left">
                <tr><th class="px-4 py-3">Sıra</th><th class="px-4 py-3">Soru</th><th class="px-4 py-3">Durum</th><th class="px-4 py-3"></th></tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($faqs as $faq)
                    <tr>
                        <td class="px-4 py-3">{{ $faq->order }}</td>
                        <td class="px-4 py-3 font-medium">{{ $faq->question }}</td>
                        <td class="px-4 py-3">{{ $faq->is_active ? 'Aktif' : 'Pasif' }}</td>
                        <td class="px-4 py-3 text-right space-x-3">
                            <a href="{{ route('admin.faqs.edit', $faq) }}" class="text-blue-600">Düzenle</a>
                            <form method="POST" action="{{ route('admin.faqs.destroy', $faq) }}" class="inline" onsubmit="return confirm('Silinsin mi?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600">Sil</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="px-4 py-6 text-center text-slate-400">Henüz soru eklenmedi.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin-layout>
