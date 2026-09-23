@php $logo = $logo ?? null; @endphp

<div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
    <div>
        <x-input-label value="Müşteri / Firma Adı" />
        <x-text-input name="name" class="block mt-1 w-full" :value="old('name', $logo->name ?? '')" required />
    </div>
    <div>
        <x-input-label value="Web Sitesi (opsiyonel)" />
        <x-text-input name="url" class="block mt-1 w-full" :value="old('url', $logo->url ?? '')" />
    </div>
</div>
<div>
    <x-input-label value="Logo" />
    @if (($logo->logo ?? null))
        <img src="{{ asset('storage/'.$logo->logo) }}" class="h-12 my-2" alt="">
    @endif
    <input type="file" name="logo" accept="image/*" class="block mt-1">
</div>
<div>
    <x-input-label value="Sıra" />
    <x-text-input type="number" name="order" class="block mt-1 w-24" :value="old('order', $logo->order ?? 0)" />
</div>
