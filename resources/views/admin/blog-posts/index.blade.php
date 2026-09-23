<x-admin-layout title="Blog Yazıları">
    <div class="flex justify-between items-center mb-5">
        <p class="text-slate-500 text-sm">Blog sayfasında listelenir.</p>
        <a href="{{ route('admin.blog-posts.create') }}" class="bg-slate-800 text-white text-sm px-4 py-2 rounded-lg">+ Yeni Yazı</a>
    </div>
    <div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-500 text-left">
                <tr><th class="px-4 py-3">Başlık</th><th class="px-4 py-3">Kategori</th><th class="px-4 py-3">Durum</th><th class="px-4 py-3">Tarih</th><th class="px-4 py-3"></th></tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($posts as $post)
                    <tr>
                        <td class="px-4 py-3 font-medium">{{ $post->title }}</td>
                        <td class="px-4 py-3">{{ $post->category->name ?? '—' }}</td>
                        <td class="px-4 py-3">{{ $post->is_published ? 'Yayında' : 'Taslak' }}</td>
                        <td class="px-4 py-3">{{ optional($post->published_at)->format('d.m.Y') }}</td>
                        <td class="px-4 py-3 text-right space-x-3">
                            <a href="{{ route('admin.blog-posts.edit', $post) }}" class="text-blue-600">Düzenle</a>
                            <form method="POST" action="{{ route('admin.blog-posts.destroy', $post) }}" class="inline" onsubmit="return confirm('Silinsin mi?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600">Sil</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-4 py-6 text-center text-slate-400">Henüz yazı eklenmedi.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin-layout>
