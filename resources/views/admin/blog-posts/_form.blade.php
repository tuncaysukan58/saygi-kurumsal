@php $post = $post ?? null; @endphp

<div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
    <div>
        <x-input-label value="Başlık" />
        <x-text-input name="title" class="block mt-1 w-full" :value="old('title', $post->title ?? '')" required />
    </div>
    <div>
        <x-input-label value="Kategori" />
        <select name="blog_category_id" class="block mt-1 w-full rounded-md border-slate-300">
            <option value="">Seçiniz</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected(old('blog_category_id', $post->blog_category_id ?? null) == $category->id)>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div>
    <x-input-label value="Özet" />
    <textarea name="excerpt" rows="2" class="block mt-1 w-full rounded-md border-slate-300">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
</div>

<div>
    <x-input-label value="İçerik" />
    <textarea name="content" rows="8" class="block mt-1 w-full rounded-md border-slate-300">{{ old('content', $post->content ?? '') }}</textarea>
</div>

<div>
    <x-input-label value="Kapak Görseli" />
    @if (($post->cover_image ?? null))
        <img src="{{ asset('storage/'.$post->cover_image) }}" class="h-20 my-2 rounded" alt="">
    @endif
    <input type="file" name="cover_image" accept="image/*" class="block mt-1">
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 gap-5 items-end">
    <div>
        <x-input-label value="Yayın Tarihi" />
        <x-text-input type="date" name="published_at" class="block mt-1 w-full" :value="old('published_at', optional($post->published_at ?? null)->format('Y-m-d'))" />
    </div>
    <label class="flex items-center gap-2 mt-6">
        <input type="checkbox" name="is_published" value="1" @checked(old('is_published', $post->is_published ?? true))>
        <span class="text-sm">Yayınlandı</span>
    </label>
</div>

@include('admin.partials._seo-fields', ['seoable' => $post])
