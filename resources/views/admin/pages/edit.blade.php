<x-admin-layout title="Sayfayı Düzenle">
    <form method="POST" action="{{ route('admin.pages.update', $page) }}" class="bg-white rounded-xl border border-slate-200 p-6 max-w-3xl space-y-5 mb-8">
        @csrf
        @method('PUT')
        <x-input-label value="Başlık" />
        <x-text-input name="title" class="block mt-1 w-full" :value="old('title', $page->title)" required />
        <x-input-label value="Giriş Metni" />
        <textarea name="intro" rows="3" class="block mt-1 w-full rounded-md border-slate-300">{{ old('intro', $page->intro) }}</textarea>

        @include('admin.partials._seo-fields', ['seoable' => $page])

        <x-primary-button>Kaydet</x-primary-button>
        <a href="{{ route('admin.pages.index') }}" class="text-sm text-slate-500 ml-3">Listeye Dön</a>
        <a href="{{ url('/'.$page->slug) }}" target="_blank" class="text-sm text-slate-500 ml-3">↗ Sayfayı Görüntüle</a>
    </form>

    <div class="bg-white rounded-xl border border-slate-200 p-6 max-w-3xl">
        <h2 class="font-semibold text-slate-700 mb-4">Bölümler ({{ $page->sections->count() }})</h2>
        <div class="space-y-3 mb-6">
            @foreach ($page->sections as $section)
                <div class="border border-slate-200 rounded-lg p-3">
                    <form method="POST" action="{{ route('admin.page-sections.update', $section) }}" class="space-y-2">
                        @csrf @method('PUT')
                        <div class="flex items-center gap-2">
                            <input name="order" type="number" value="{{ $section->order }}" class="w-16 rounded-md border-slate-300 text-sm">
                            <input name="anchor" value="{{ $section->anchor }}" placeholder="anchor (örn. vizyon)" class="w-40 rounded-md border-slate-300 text-sm">
                            <input name="title" value="{{ $section->title }}" class="flex-1 rounded-md border-slate-300 text-sm">
                            <button class="text-xs text-blue-600">Kaydet</button>
                        </div>
                        <textarea name="content" rows="3" class="w-full rounded-md border-slate-300 text-sm">{{ $section->content }}</textarea>
                    </form>
                    <form method="POST" action="{{ route('admin.page-sections.destroy', $section) }}" onsubmit="return confirm('Silinsin mi?')" class="mt-1">
                        @csrf @method('DELETE')
                        <button class="text-xs text-red-600">Sil</button>
                    </form>
                </div>
            @endforeach
        </div>

        <form method="POST" action="{{ route('admin.page-sections.store', $page) }}" class="space-y-2 border-t border-slate-100 pt-4">
            @csrf
            <div class="flex items-center gap-2">
                <input name="order" type="number" placeholder="Sıra" class="w-16 rounded-md border-slate-300 text-sm">
                <input name="anchor" placeholder="anchor" class="w-40 rounded-md border-slate-300 text-sm">
                <input name="title" placeholder="Bölüm başlığı" required class="flex-1 rounded-md border-slate-300 text-sm">
            </div>
            <textarea name="content" rows="3" placeholder="İçerik" class="w-full rounded-md border-slate-300 text-sm"></textarea>
            <button class="text-xs bg-slate-800 text-white rounded px-3 py-2">Bölüm Ekle</button>
        </form>
    </div>
</x-admin-layout>
