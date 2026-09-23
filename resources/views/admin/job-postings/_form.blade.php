@php $posting = $posting ?? null; @endphp

<div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
    <div>
        <x-input-label value="Pozisyon Adı" />
        <x-text-input name="title" class="block mt-1 w-full" :value="old('title', $posting->title ?? '')" required />
    </div>
    <div>
        <x-input-label value="Departman" />
        <x-text-input name="department" class="block mt-1 w-full" :value="old('department', $posting->department ?? '')" />
    </div>
    <div>
        <x-input-label value="Lokasyon" />
        <x-text-input name="location" class="block mt-1 w-full" :value="old('location', $posting->location ?? 'İstanbul')" />
    </div>
    <div>
        <x-input-label value="Çalışma Şekli" />
        <x-text-input name="employment_type" class="block mt-1 w-full" :value="old('employment_type', $posting->employment_type ?? 'Tam Zamanlı')" />
    </div>
</div>
<div>
    <x-input-label value="Açıklama" />
    <textarea name="description" rows="4" class="block mt-1 w-full rounded-md border-slate-300">{{ old('description', $posting->description ?? '') }}</textarea>
</div>
<div class="flex items-center gap-6">
    <div>
        <x-input-label value="Sıra" />
        <x-text-input type="number" name="order" class="block mt-1 w-24" :value="old('order', $posting->order ?? 0)" />
    </div>
    <label class="flex items-center gap-2 mt-6">
        <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $posting->is_active ?? true))>
        <span class="text-sm">Aktif (başvuruya açık)</span>
    </label>
</div>
