<x-app-layout :title="$page->seo_title ?: $page->title" :description="$page->seo_description ?: $page->intro" :keywords="$page->seo_keywords">
<section class="pagehero">
    <div class="wrap">
        <div class="breadcrumbs">Anasayfa / {{ $page->title }}</div>
        <h1>{{ $page->title }}</h1>
        <p>{{ $page->intro }}</p>
    </div>
</section>
<section class="section">
    <div class="wrap contentgrid" data-tabs>
        <aside class="sidebar">
            <div class="sidebox">
                @foreach ($page->sections as $section)
                    <a href="#{{ $section->anchor ?: 'section-'.$section->id }}" class="tab-link">{{ $section->title }}</a>
                @endforeach
            </div>
        </aside>
        <article class="article">
            @forelse ($page->sections as $section)
                <div id="{{ $section->anchor ?: 'section-'.$section->id }}" class="sustainblock tab-panel">
                    <h2>{{ $section->title }}</h2>
                    <div>{!! nl2br(e($section->content)) !!}</div>
                </div>
            @empty
                <p>Bu sayfa için henüz içerik eklenmedi.</p>
            @endforelse
        </article>
    </div>
</section>
</x-app-layout>
