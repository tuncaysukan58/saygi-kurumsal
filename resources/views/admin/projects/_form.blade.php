@php $project = $project ?? null; @endphp

<div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
    <div>
        <x-input-label value="Başlık" />
        <x-text-input name="title" class="block mt-1 w-full" :value="old('title', $project->title ?? '')" required />
    </div>
    <div>
        <x-input-label value="Sektör" />
        <select name="sector_id" class="block mt-1 w-full rounded-md border-slate-300">
            <option value="">Seçiniz</option>
            @foreach ($sectors as $sector)
                <option value="{{ $sector->id }}" @selected(old('sector_id', $project->sector_id ?? null) == $sector->id)>{{ $sector->title }}</option>
            @endforeach
        </select>
    </div>
</div>

<div>
    <x-input-label value="Özet" />
    <textarea name="summary" rows="2" class="block mt-1 w-full rounded-md border-slate-300">{{ old('summary', $project->summary ?? '') }}</textarea>
</div>

<div>
    <x-input-label value="Detay İçeriği" />
    <textarea name="content" rows="6" class="block mt-1 w-full rounded-md border-slate-300">{{ old('content', $project->content ?? '') }}</textarea>
</div>

<div>
    <x-input-label value="Kapak Görseli" />
    @if (($project->cover_image ?? null))
        <img src="{{ asset('storage/'.$project->cover_image) }}" class="h-20 my-2 rounded" alt="">
    @endif
    <input type="file" name="cover_image" accept="image/*" class="block mt-1">
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 gap-5 items-end">
    <div>
        <x-input-label value="Sonuç / Metrik (örn. %30 verimlilik artışı)" />
        <x-text-input name="result_metric" class="block mt-1 w-full" :value="old('result_metric', $project->result_metric ?? '')" />
    </div>
    <div class="flex items-center gap-6">
        <div>
            <x-input-label value="Sıra" />
            <x-text-input type="number" name="order" class="block mt-1 w-24" :value="old('order', $project->order ?? 0)" />
        </div>
        <label class="flex items-center gap-2 mt-6">
            <input type="checkbox" name="is_featured" value="1" @checked(old('is_featured', $project->is_featured ?? false))>
            <span class="text-sm">Öne çıkan</span>
        </label>
    </div>
</div>

@include('admin.partials._seo-fields', ['seoable' => $project])
