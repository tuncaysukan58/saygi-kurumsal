@php $slide = $slide ?? null; @endphp

<div>
    <x-input-label value="Slayt Görseli" />
    @if (($slide->image ?? null))
        <img src="{{ asset('storage/'.$slide->image) }}" class="h-24 my-2 rounded" alt="">
    @endif
    <input type="file" name="image" accept="image/*" class="block mt-1">
    <p class="text-xs text-slate-400 mt-1">Önerilen: geniş, yatay bir fotoğraf (örn. 1600x900px).</p>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
    <div>
        <x-input-label value="Üst Etiket" />
        <x-text-input name="eyebrow" class="block mt-1 w-full" :value="old('eyebrow', $slide->eyebrow ?? '')" />
    </div>
    <div>
        <x-input-label value="Sıra" />
        <x-text-input type="number" name="order" class="block mt-1 w-24" :value="old('order', $slide->order ?? 0)" />
    </div>
</div>

<div>
    <x-input-label value="Başlık" />
    <x-text-input name="title" class="block mt-1 w-full" :value="old('title', $slide->title ?? '')" />
</div>
<div>
    <x-input-label value="Alt Başlık" />
    <textarea name="subtitle" rows="2" class="block mt-1 w-full rounded-md border-slate-300">{{ old('subtitle', $slide->subtitle ?? '') }}</textarea>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
    <div class="flex gap-3">
        <div class="flex-1">
            <x-input-label value="Birincil Buton Metni" />
            <x-text-input name="primary_btn_text" class="block mt-1 w-full" :value="old('primary_btn_text', $slide->primary_btn_text ?? '')" />
        </div>
        <div class="flex-1">
            <x-input-label value="Birincil Buton Linki" />
            <x-text-input name="primary_btn_url" class="block mt-1 w-full" :value="old('primary_btn_url', $slide->primary_btn_url ?? '')" />
        </div>
    </div>
    <div class="flex gap-3">
        <div class="flex-1">
            <x-input-label value="İkincil Buton Metni" />
            <x-text-input name="secondary_btn_text" class="block mt-1 w-full" :value="old('secondary_btn_text', $slide->secondary_btn_text ?? '')" />
        </div>
        <div class="flex-1">
            <x-input-label value="İkincil Buton Linki" />
            <x-text-input name="secondary_btn_url" class="block mt-1 w-full" :value="old('secondary_btn_url', $slide->secondary_btn_url ?? '')" />
        </div>
    </div>
</div>

<label class="flex items-center gap-2">
    <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $slide->is_active ?? true))>
    <span class="text-sm">Aktif (sitede görünür)</span>
</label>
