@php $certificate = $certificate ?? null; @endphp

<div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
    <div>
        <x-input-label value="Başlık" />
        <x-text-input name="title" class="block mt-1 w-full" :value="old('title', $certificate->title ?? '')" required />
    </div>
    <div>
        <x-input-label value="Kategori (yetki / iso / isg / diğer)" />
        <x-text-input name="category" class="block mt-1 w-full" :value="old('category', $certificate->category ?? '')" />
    </div>
</div>
<div>
    <x-input-label value="Açıklama" />
    <textarea name="description" rows="2" class="block mt-1 w-full rounded-md border-slate-300">{{ old('description', $certificate->description ?? '') }}</textarea>
</div>
<div>
    <x-input-label value="Görsel" />
    @if (($certificate->image ?? null))
        <img src="{{ asset('storage/'.$certificate->image) }}" class="h-16 my-2 rounded" alt="">
    @endif
    <input type="file" name="image" accept="image/*" class="block mt-1">
</div>
<div>
    <x-input-label value="Sıra" />
    <x-text-input type="number" name="order" class="block mt-1 w-24" :value="old('order', $certificate->order ?? 0)" />
</div>
