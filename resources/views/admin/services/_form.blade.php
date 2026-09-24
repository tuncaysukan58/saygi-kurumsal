@php $service = $service ?? null; @endphp

<div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
    <div>
        <x-input-label value="Başlık" />
        <x-text-input name="title" class="block mt-1 w-full" :value="old('title', $service->title ?? '')" required />
    </div>
    <div>
        <x-input-label value="İkon (emoji, görsel yoksa kullanılır)" />
        <x-text-input name="icon" class="block mt-1 w-full" :value="old('icon', $service->icon ?? '')" />
    </div>
</div>

<div>
    <x-input-label value="Kart Görseli (emoji yerine gösterilir)" />
    @if (($service->icon_image ?? null))
        <img src="{{ asset('storage/'.$service->icon_image) }}" class="h-16 my-2 rounded" alt="">
    @endif
    <input type="file" name="icon_image" accept="image/*" class="block mt-1">
    <p class="text-xs text-slate-400 mt-1">Yüklenirse hizmet kartlarında emoji yerine bu görsel gösterilir. Önerilen: kare, en az 200x200px, PNG/SVG.</p>
</div>

<div>
    <x-input-label value="Kısa Açıklama" />
    <x-text-input name="short_desc" class="block mt-1 w-full" :value="old('short_desc', $service->short_desc ?? '')" />
</div>

<div>
    <x-input-label value="Detay İçeriği" />
    <textarea name="content" rows="6" class="block mt-1 w-full rounded-md border-slate-300">{{ old('content', $service->content ?? '') }}</textarea>
    <p class="text-xs text-slate-400 mt-1">Uzun metinler otomatik olarak paragraflara bölünür. Kendi paragraf araların olsun isterseniz iki satır boşluk bırakarak (Enter'a iki kez basarak) ayırabilirsiniz.</p>
</div>

<div>
    <x-input-label value="Kapak Görseli" />
    @if (($service->cover_image ?? null))
        <img src="{{ asset('storage/'.$service->cover_image) }}" class="h-20 my-2 rounded" alt="">
    @endif
    <input type="file" name="cover_image" accept="image/*" class="block mt-1">
</div>

<div class="flex items-center gap-6">
    <div>
        <x-input-label value="Sıra" />
        <x-text-input type="number" name="order" class="block mt-1 w-24" :value="old('order', $service->order ?? 0)" />
    </div>
    <label class="flex items-center gap-2 mt-6">
        <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $service->is_active ?? true))>
        <span class="text-sm">Aktif (sitede görünür)</span>
    </label>
</div>

@php
    $selectedSectorIds = old('sectors', ($service->sectors ?? collect())->pluck('id')->all());
    $existingSectorPivots = ($service->sectors ?? collect())->keyBy('id');
@endphp
<div>
    <x-input-label value="Hizmet Verdiğimiz Sektörler" />
    <p class="text-xs text-slate-400 mt-1 mb-2">
        Bu hizmetin verildiği sektörleri işaretleyin. İsterseniz her sektöre özel bir açıklama yazabilirsiniz
        (örn. "Fabrikalarda özel güvenlik hizmeti nasıl yürütülür"). Boş bırakılırsa sektörün genel açıklaması
        gösterilir. Bu bölüm sayfada "Sektöre Özel Bilgiler" başlığı altında, tıklayınca açılan bir liste olarak
        gösterilir.
    </p>
    <div class="space-y-2 border border-slate-200 rounded-lg p-3">
        @forelse ($allSectors as $sectorOption)
            @php $existingSector = $existingSectorPivots->get($sectorOption->id); @endphp
            <div class="border border-slate-100 rounded-lg p-3">
                <label class="flex items-center gap-2 text-sm font-medium">
                    <input type="checkbox" name="sectors[]" value="{{ $sectorOption->id }}" @checked(in_array($sectorOption->id, $selectedSectorIds))>
                    {{ $sectorOption->title }}
                </label>
                <textarea name="sector_content[{{ $sectorOption->id }}]" rows="2"
                    placeholder="Bu sektöre özel açıklama (opsiyonel)"
                    class="mt-2 block w-full rounded-md border-slate-300 text-sm">{{ old('sector_content.'.$sectorOption->id, $existingSector->pivot->content ?? '') }}</textarea>
            </div>
        @empty
            <p class="text-sm text-slate-400">Henüz sektör eklenmedi.</p>
        @endforelse
    </div>
</div>

@include('admin.partials._seo-fields', ['seoable' => $service])
