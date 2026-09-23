@php $seoable = $seoable ?? null; @endphp
<div class="border-t border-slate-100 pt-5 mt-2">
    <h3 class="text-sm font-semibold text-slate-500 mb-3">SEO Ayarları</h3>
    <div class="space-y-4">
        <div>
            <x-input-label value="SEO Başlığı (boş bırakılırsa sayfa başlığı kullanılır)" />
            <x-text-input name="seo_title" class="block mt-1 w-full" :value="old('seo_title', $seoable->seo_title ?? '')" maxlength="255" />
        </div>
        <div>
            <x-input-label value="SEO Açıklaması (meta description)" />
            <textarea name="seo_description" rows="2" maxlength="500" class="block mt-1 w-full rounded-md border-slate-300">{{ old('seo_description', $seoable->seo_description ?? '') }}</textarea>
        </div>
        <div>
            <x-input-label value="Anahtar Kelimeler (virgülle ayırın)" />
            <x-text-input name="seo_keywords" class="block mt-1 w-full" :value="old('seo_keywords', $seoable->seo_keywords ?? '')" placeholder="özel güvenlik, kurumsal güvenlik, ..." />
        </div>
    </div>
</div>
