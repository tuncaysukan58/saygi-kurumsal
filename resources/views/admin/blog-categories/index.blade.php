<x-admin-layout title="Blog Kategorileri">
    <div class="flex justify-between items-center mb-5">
        <p class="text-slate-500 text-sm">Blog yazılarını gruplamak için kullanılır.</p>
        <a href="{{ route('admin.blog-categories.create') }}" class="bg-slate-800 text-white text-sm px-4 py-2 rounded-lg">+ Yeni Kategori</a>
    </div>
    <div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-500 text-left">
                <tr><th class="px-4 py-3">Ad</th><th class="px-4 py-3">Yazı Sayısı</th><th class="px-4 py-3"></th></tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($categories as $category)
                    <tr>
                        <td class="px-4 py-3 font-medium">{{ $category->name }}</td>
                        <td class="px-4 py-3">{{ $category->posts_count }}</td>
                        <td class="px-4 py-3 text-right space-x-3">
                            <a href="{{ route('admin.blog-categories.edit', $category) }}" class="text-blue-600">Düzenle</a>
                            <form method="POST" action="{{ route('admin.blog-categories.destroy', $category) }}" class="inline" onsubmit="return confirm('Silinsin mi?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600">Sil</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="px-4 py-6 text-center text-slate-400">Henüz kategori eklenmedi.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin-layout>
