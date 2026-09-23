<x-app-layout title="Faaliyet Alanlarımız / Hizmetlerimiz">
<section class="pagehero">
    <div class="wrap">
        <div class="breadcrumbs">Anasayfa / Faaliyet Alanlarımız / Hizmetlerimiz</div>
        <h1>Faaliyet Alanlarımız / Hizmetlerimiz</h1>
        <p>Profesyonel, güvenilir ve sürdürülebilir kurumsal çözümler.</p>
    </div>
</section>
<section class="section">
    <div class="wrap center">
        <h2>Tek Çatı Altında Entegre Hizmetler</h2>
        <div class="cards">
            @foreach ($services as $service)
                <article>
                    <div class="pic">
                        @if ($service->icon_image)
                            <img src="{{ asset('storage/'.$service->icon_image) }}" alt="{{ $service->title }}">
                        @else
                            {{ $service->icon }}
                        @endif
                    </div>
                    <h3>{{ $service->title }}</h3>
                    <p>{{ $service->short_desc }}</p>
                    <a href="{{ route('services.show', $service) }}">Hizmeti İncele →</a>
                </article>
            @endforeach
        </div>
    </div>
</section>
</x-app-layout>
