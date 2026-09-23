@php $stat = $stat ?? null; @endphp

<div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
    <div>
        <x-input-label value="Değer (örn. 10+)" />
        <x-text-input name="value" class="block mt-1 w-full" :value="old('value', $stat->value ?? '')" required />
    </div>
    <div>
        <x-input-label value="Etiket (örn. Yıllık deneyim)" />
        <x-text-input name="label" class="block mt-1 w-full" :value="old('label', $stat->label ?? '')" required />
    </div>
    <div>
        <x-input-label value="İkon (emoji, opsiyonel)" />
        <x-text-input name="icon" class="block mt-1 w-full" :value="old('icon', $stat->icon ?? '')" />
    </div>
</div>
<div>
    <x-input-label value="Sıra" />
    <x-text-input type="number" name="order" class="block mt-1 w-24" :value="old('order', $stat->order ?? 0)" />
</div>
