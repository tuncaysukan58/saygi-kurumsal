@php $sector = $sector ?? null; @endphp

<div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
    <div>
        <x-input-label value="Başlık" />
        <x-text-input name="title" class="block mt-1 w-full" :value="old('title', $sector->title ?? '')" required />
    </div>
    <div>
        <x-input-label value="İkon (emoji, görsel yoksa kullanılır)" />
        <x-text-input name="icon" class="block mt-1 w-full" :value="old('icon', $sector->icon ?? '')" />
    </div>
</div>

<div>
    <x-input-label value="Kart Görseli (emoji yerine gösterilir)" />
    @if (($sector->icon_image ?? null))
        <img src="{{ asset('storage/'.$sector->icon_image) }}" class="h-16 my-2 rounded" alt="">
    @endif
    <input type="file" name="icon_image" accept="image/*" class="block mt-1">
    <p class="text-xs text-slate-400 mt-1">Yüklenirse sektör kartlarında emoji yerine bu görsel gösterilir. Önerilen: kare, en az 200x200px, PNG/SVG.</p>
</div>
<div>
    <x-input-label value="Açıklama" />
    <textarea name="description" rows="3" class="block mt-1 w-full rounded-md border-slate-300">{{ old('description', $sector->description ?? '') }}</textarea>
</div>
<div>
    <x-input-label value="Sıra" />
    <x-text-input type="number" name="order" class="block mt-1 w-24" :value="old('order', $sector->order ?? 0)" />
</div>

<hr class="my-2">
<h3 class="font-semibold text-slate-600 text-sm">SEO Ayarları</h3>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
    <div>
        <x-input-label value="SEO Başlık (boş bırakılırsa sektör adı kullanılır)" />
        <x-text-input name="seo_title" class="block mt-1 w-full" :value="old('seo_title', $sector->seo_title ?? '')" placeholder="Örn: Güvenlik Sektörü | SAY Kurumsal" />
    </div>
    <div>
        <x-input-label value="Anahtar Kelimeler" />
        <x-text-input name="seo_keywords" class="block mt-1 w-full" :value="old('seo_keywords', $sector->seo_keywords ?? '')" placeholder="özel güvenlik, güvenlik hizmeti, ..." />
    </div>
</div>
<div>
    <x-input-label value="SEO Açıklama (meta description)" />
    <textarea name="seo_description" rows="2" class="block mt-1 w-full rounded-md border-slate-300" placeholder="Arama motorlarında gösterilecek kısa açıklama (max 160 karakter)">{{ old('seo_description', $sector->seo_description ?? '') }}</textarea>
</div>
