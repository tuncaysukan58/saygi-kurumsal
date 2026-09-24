<x-app-layout :title="$sector->seo_title ?: $sector->title" :description="$sector->seo_description ?: $sector->description" :keywords="$sector->seo_keywords">
<section class="pagehero">
    <div class="wrap">
        <div class="breadcrumbs">Anasayfa / <a href="{{ route('sectors.index') }}" style="color:#fff;opacity:.75">Sektörler</a> / {{ $sector->title }}</div>
        <h1>
            @if ($sector->icon_image)
                <img src="{{ asset('storage/'.$sector->icon_image) }}" alt="" style="width:48px;height:48px;object-fit:contain;vertical-align:middle;margin-right:12px;border-radius:10px">
            @else
                {{ $sector->icon }}
            @endif
            {{ $sector->title }}
        </h1>
        @if ($sector->description)<p>{{ $sector->description }}</p>@endif
    </div>
</section>
<section class="section">
    <div class="wrap side-layout">
        <aside class="side-nav">
            <b style="display:block;padding:8px 12px;font-size:13px;color:#7a8caa;text-transform:uppercase;letter-spacing:.06em;margin-bottom:4px">Sektörler</b>
            @foreach ($sectors as $s)
                <a href="{{ route('sectors.show', $s) }}" style="{{ $s->id === $sector->id ? 'background:#071f59;color:#fff;border-radius:8px;' : '' }}">
                    @if ($s->icon_image)
                        <img src="{{ asset('storage/'.$s->icon_image) }}" alt="" style="width:20px;height:20px;object-fit:contain;border-radius:4px;vertical-align:middle;margin-right:6px">
                    @else
                        {{ $s->icon }}
                    @endif
                    {{ $s->title }}
                </a>
            @endforeach
        </aside>
        <div>
            <p class="label">SEKTÖRLER</p>
            <h2>{{ $sector->title }}</h2>
            @if ($sector->description)
                <p style="color:var(--muted);line-height:1.7;font-size:17px;text-align:justify">{{ $sector->description }}</p>
            @endif
            <div class="bottomcta" style="margin-top:40px">
                <a href="{{ route('contact.index') }}#teklif">Bu Sektör İçin Teklif Al →</a>
                <a href="{{ route('contact.index') }}">Bize Ulaşın →</a>
            </div>
        </div>
    </div>
</section>
<section class="cta">
    <div class="wrap">
        <div><h2>{{ $sector->title }} Sektörüne Özel Çözüm Alın</h2><p>Sahanızı ve ihtiyacınızı birlikte değerlendirelim.</p></div>
        <a class="btn orange" href="{{ route('contact.index') }}#teklif">Teklif Al →</a>
    </div>
</section>
</x-app-layout>
