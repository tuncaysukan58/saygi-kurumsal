<x-app-layout :title="$service->seo_title ?: $service->title" :description="$service->seo_description ?: $service->short_desc" :keywords="$service->seo_keywords">
<section class="pagehero">
    <div class="wrap">
        <div class="breadcrumbs">Anasayfa / {{ $service->title }}</div>
        <h1>{{ $service->title }}</h1>
        <p>{{ $service->short_desc }}</p>
    </div>
</section>
<section class="section">
    <div class="wrap contentgrid" data-tabs>
        <aside class="sidebar">
            <div class="sidebox">
                <b>{{ $service->title }} Alt Hizmetleri</b>
                @foreach ($service->items as $item)
                    <a href="#item-{{ $item->id }}" class="tab-link">{{ $item->title }}</a>
                @endforeach
            </div>
            <div class="sidebox">
                <b>Hizmet Verdiğimiz Sektörler</b>
                @foreach ($sectors as $sector)
                    <a href="{{ route('sectors.show', $sector) }}">{{ $sector->title }}</a>
                @endforeach
            </div>
        </aside>
        <article class="servicebody">
            <h2>{{ $service->title }}</h2>
            @if ($service->content)
                <p class="lead">{!! nl2br(e($service->content)) !!}</p>
            @endif

            @foreach ($service->items as $item)
                <div class="sustainblock tab-panel" id="item-{{ $item->id }}">
                    <h3>{{ $item->title }}</h3>
                    <p>{{ $item->description }}</p>
                </div>
            @endforeach

            @if ($sectors->isNotEmpty())
                <h3>Hizmet Verdiğimiz Sektörler</h3>
                <div class="sectorchips">
                    @foreach ($sectors as $sector)
                        <a href="{{ route('sectors.show', $sector) }}">{{ $sector->title }}</a>
                    @endforeach
                </div>
            @endif

            <div class="bottomcta">
                <a href="{{ route('contact.index') }}#teklif">Teklif Al →</a>
                <a href="{{ route('contact.index') }}">Bize Ulaşın →</a>
            </div>
        </article>
    </div>
</section>
</x-app-layout>
