<x-admin-layout title="Anasayfa Slider">
    <div class="flex justify-between items-center mb-5">
        <p class="text-slate-500 text-sm">Anasayfanın en üstünde dönen slaytlar. Sırayla gösterilir.</p>
        <a href="{{ route('admin.hero-slides.create') }}" class="bg-slate-800 text-white text-sm px-4 py-2 rounded-lg">+ Yeni Slayt</a>
    </div>
    <div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-500 text-left">
                <tr><th class="px-4 py-3">Sıra</th><th class="px-4 py-3">Görsel</th><th class="px-4 py-3">Başlık</th><th class="px-4 py-3">Durum</th><th class="px-4 py-3"></th></tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($slides as $slide)
                    <tr>
                        <td class="px-4 py-3">{{ $slide->order }}</td>
                        <td class="px-4 py-3">
                            @if ($slide->image)
                                <img src="{{ asset('storage/'.$slide->image) }}" class="h-10 rounded" alt="">
                            @endif
                        </td>
                        <td class="px-4 py-3 font-medium">{{ $slide->title }}</td>
                        <td class="px-4 py-3">{{ $slide->is_active ? 'Aktif' : 'Pasif' }}</td>
                        <td class="px-4 py-3 text-right space-x-3">
                            <a href="{{ route('admin.hero-slides.edit', $slide) }}" class="text-blue-600">Düzenle</a>
                            <form method="POST" action="{{ route('admin.hero-slides.destroy', $slide) }}" class="inline" onsubmit="return confirm('Silinsin mi?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600">Sil</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-4 py-6 text-center text-slate-400">Henüz slayt eklenmedi. Slayt eklemezseniz anasayfada varsayılan bir görsel gösterilir.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin-layout>
