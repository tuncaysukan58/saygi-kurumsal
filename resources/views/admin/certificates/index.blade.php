<x-admin-layout title="Belgeler & Yetkinlikler">
    <div class="flex justify-between items-center mb-5">
        <p class="text-slate-500 text-sm">Anasayfada "Belgeler & Yetkinlikler" bölümünde listelenir.</p>
        <a href="{{ route('admin.certificates.create') }}" class="bg-slate-800 text-white text-sm px-4 py-2 rounded-lg">+ Yeni Belge</a>
    </div>
    <div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-500 text-left">
                <tr><th class="px-4 py-3">Sıra</th><th class="px-4 py-3">Başlık</th><th class="px-4 py-3">Kategori</th><th class="px-4 py-3"></th></tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($certificates as $certificate)
                    <tr>
                        <td class="px-4 py-3">{{ $certificate->order }}</td>
                        <td class="px-4 py-3 font-medium">{{ $certificate->title }}</td>
                        <td class="px-4 py-3">{{ $certificate->category }}</td>
                        <td class="px-4 py-3 text-right space-x-3">
                            <a href="{{ route('admin.certificates.edit', $certificate) }}" class="text-blue-600">Düzenle</a>
                            <form method="POST" action="{{ route('admin.certificates.destroy', $certificate) }}" class="inline" onsubmit="return confirm('Silinsin mi?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600">Sil</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="px-4 py-6 text-center text-slate-400">Henüz belge eklenmedi.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin-layout>
