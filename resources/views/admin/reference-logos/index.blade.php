<x-admin-layout title="Referans Logoları">
    <div class="flex justify-between items-center mb-5">
        <p class="text-slate-500 text-sm">Anasayfada "Referanslar" bölümünde gösterilir.</p>
        <a href="{{ route('admin.reference-logos.create') }}" class="bg-slate-800 text-white text-sm px-4 py-2 rounded-lg">+ Yeni Logo</a>
    </div>
    <div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-500 text-left">
                <tr><th class="px-4 py-3">Sıra</th><th class="px-4 py-3">Logo</th><th class="px-4 py-3">Ad</th><th class="px-4 py-3"></th></tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($logos as $logo)
                    <tr>
                        <td class="px-4 py-3">{{ $logo->order }}</td>
                        <td class="px-4 py-3">
                            @if ($logo->logo)
                                <img src="{{ asset('storage/'.$logo->logo) }}" class="h-8" alt="">
                            @endif
                        </td>
                        <td class="px-4 py-3 font-medium">{{ $logo->name }}</td>
                        <td class="px-4 py-3 text-right space-x-3">
                            <a href="{{ route('admin.reference-logos.edit', $logo) }}" class="text-blue-600">Düzenle</a>
                            <form method="POST" action="{{ route('admin.reference-logos.destroy', $logo) }}" class="inline" onsubmit="return confirm('Silinsin mi?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600">Sil</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="px-4 py-6 text-center text-slate-400">Henüz logo eklenmedi.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin-layout>
