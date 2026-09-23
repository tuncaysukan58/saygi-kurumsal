<x-admin-layout title="Anasayfa İçerikleri">
    <form method="POST" action="{{ route('admin.home-content.update') }}" enctype="multipart/form-data" class="bg-white rounded-xl border border-slate-200 p-6 space-y-5 mb-8">
        @csrf
        @method('PUT')

        <div class="bg-blue-50 border border-blue-100 text-blue-800 text-sm rounded-lg p-4">
            Anasayfanın en üstündeki kayan görsel (slider) artık ayrı bir bölümden yönetiliyor.
            <a href="{{ route('admin.hero-slides.index') }}" class="font-semibold underline">Anasayfa Slider'ı düzenlemek için tıklayın →</a>
        </div>

        <h2 class="font-semibold text-slate-700">Hakkımızda</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <x-input-label value="Ana Görsel" />
                @if ($content->about_image)
                    <img src="{{ asset('storage/'.$content->about_image) }}" class="h-24 my-2 rounded" alt="">
                @endif
                <input type="file" name="about_image" accept="image/*" class="block mt-1">
            </div>
            <div>
                <x-input-label value="Küçük Görsel (fotoğrafın üzerinde görünür)" />
                @if ($content->about_image_secondary)
                    <img src="{{ asset('storage/'.$content->about_image_secondary) }}" class="h-24 my-2 rounded" alt="">
                @endif
                <input type="file" name="about_image_secondary" accept="image/*" class="block mt-1">
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <x-input-label value="Etiket" />
                <x-text-input name="about_label" class="block mt-1 w-full" :value="old('about_label', $content->about_label)" />
            </div>
            <div>
                <x-input-label value="Başlık" />
                <x-text-input name="about_title" class="block mt-1 w-full" :value="old('about_title', $content->about_title)" />
            </div>
        </div>
        <div>
            <x-input-label value="Metin" />
            <textarea name="about_text" rows="4" class="block mt-1 w-full rounded-md border-slate-300">{{ old('about_text', $content->about_text) }}</textarea>
        </div>

        <hr class="my-2">
        <h2 class="font-semibold text-slate-700">"Neden Biz" Bölümü</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <x-input-label value="Etiket" />
                <x-text-input name="why_label" class="block mt-1 w-full" :value="old('why_label', $content->why_label)" />
            </div>
            <div>
                <x-input-label value="Başlık" />
                <x-text-input name="why_title" class="block mt-1 w-full" :value="old('why_title', $content->why_title)" />
            </div>
        </div>
        <div>
            <x-input-label value="Metin" />
            <textarea name="why_text" rows="2" class="block mt-1 w-full rounded-md border-slate-300">{{ old('why_text', $content->why_text) }}</textarea>
        </div>

        <hr class="my-2">
        <h2 class="font-semibold text-slate-700">"Çalışma Sürecimiz" Bölümü</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <x-input-label value="Etiket" />
                <x-text-input name="process_label" class="block mt-1 w-full" :value="old('process_label', $content->process_label)" />
            </div>
            <div>
                <x-input-label value="Başlık" />
                <x-text-input name="process_title" class="block mt-1 w-full" :value="old('process_title', $content->process_title)" />
            </div>
        </div>
        <div>
            <x-input-label value="Metin" />
            <textarea name="process_text" rows="2" class="block mt-1 w-full rounded-md border-slate-300">{{ old('process_text', $content->process_text) }}</textarea>
        </div>

        <x-primary-button>Kaydet</x-primary-button>
    </form>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-xl border border-slate-200 p-6">
            <h2 class="font-semibold text-slate-700 mb-4">"Neden Biz" Özellikleri</h2>
            <ul class="space-y-2 mb-4">
                @foreach ($features as $feature)
                    <li class="flex items-center gap-2 border border-slate-200 rounded-lg p-2">
                        <form method="POST" action="{{ route('admin.home-features.update', $feature) }}" class="flex-1 flex items-center gap-2">
                            @csrf @method('PUT')
                            <input name="icon" value="{{ $feature->icon }}" class="w-14 rounded-md border-slate-300 text-sm" placeholder="icon">
                            <input name="title" value="{{ $feature->title }}" class="flex-1 rounded-md border-slate-300 text-sm">
                            <input name="order" type="number" value="{{ $feature->order }}" class="w-16 rounded-md border-slate-300 text-sm">
                            <button class="text-xs text-blue-600">Kaydet</button>
                        </form>
                        <form method="POST" action="{{ route('admin.home-features.destroy', $feature) }}" onsubmit="return confirm('Silinsin mi?')">
                            @csrf @method('DELETE')
                            <button class="text-xs text-red-600">Sil</button>
                        </form>
                    </li>
                @endforeach
            </ul>
            <form method="POST" action="{{ route('admin.home-features.store') }}" class="flex items-center gap-2">
                @csrf
                <input name="icon" placeholder="icon" class="w-14 rounded-md border-slate-300 text-sm">
                <input name="title" placeholder="Başlık" required class="flex-1 rounded-md border-slate-300 text-sm">
                <input name="order" type="number" placeholder="Sıra" class="w-16 rounded-md border-slate-300 text-sm">
                <button class="text-xs bg-slate-800 text-white rounded px-3 py-2">Ekle</button>
            </form>
        </div>

        <div class="bg-white rounded-xl border border-slate-200 p-6">
            <h2 class="font-semibold text-slate-700 mb-4">Çalışma Süreci Adımları</h2>
            <ul class="space-y-2 mb-4">
                @foreach ($steps as $step)
                    <li class="border border-slate-200 rounded-lg p-2">
                        <form id="upd-step-{{ $step->id }}" method="POST" action="{{ route('admin.process-steps.update', $step) }}" class="flex items-center gap-2">
                            @csrf @method('PUT')
                            <input name="order" type="number" value="{{ $step->order }}" class="w-14 rounded-md border-slate-300 text-sm">
                            <input name="title" value="{{ $step->title }}" class="flex-1 rounded-md border-slate-300 text-sm">
                            <button class="text-xs text-blue-600">Kaydet</button>
                        </form>
                        <textarea form="upd-step-{{ $step->id }}" name="description" rows="1" class="w-full mt-1 rounded-md border-slate-300 text-sm">{{ $step->description }}</textarea>
                        <form method="POST" action="{{ route('admin.process-steps.destroy', $step) }}" onsubmit="return confirm('Silinsin mi?')" class="mt-1">
                            @csrf @method('DELETE')
                            <button class="text-xs text-red-600">Sil</button>
                        </form>
                    </li>
                @endforeach
            </ul>
            <form method="POST" action="{{ route('admin.process-steps.store') }}" class="space-y-2">
                @csrf
                <div class="flex items-center gap-2">
                    <input name="order" type="number" placeholder="Sıra" class="w-14 rounded-md border-slate-300 text-sm">
                    <input name="title" placeholder="Başlık" required class="flex-1 rounded-md border-slate-300 text-sm">
                </div>
                <textarea name="description" placeholder="Açıklama" rows="1" class="w-full rounded-md border-slate-300 text-sm"></textarea>
                <button class="text-xs bg-slate-800 text-white rounded px-3 py-2">Ekle</button>
            </form>
        </div>
    </div>
</x-admin-layout>
