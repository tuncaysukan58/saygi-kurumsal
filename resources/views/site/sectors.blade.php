<x-app-layout title="Sektörler" description="Güvenlik, temizlik, yemekhane ve daha fazlası – her sektöre özel kurumsal hizmet modeli.">
<section class="section sectorhero">
    <div class="wrap">
        <p class="label">SEKTÖRLER</p>
        <h1>Farklı Sektörlere Özel Kurumsal Çözümler</h1>
        <p class="lead">Her işletmenin riskleri, çalışma düzeni ve operasyon ihtiyacı farklıdır. Hizmet modelimizi sektöre ve sahaya göre planlıyoruz.</p>
    </div>
</section>
<section class="section">
    <div class="wrap">
        <div class="sectorgrid">
            @foreach ($sectors as $sector)
                <a href="{{ route('sectors.show', $sector) }}" style="text-decoration:none">
                    <div class="sector" style="cursor:pointer;transition:box-shadow .18s,transform .18s" onmouseenter="this.style.boxShadow='0 16px 40px #102d4e22';this.style.transform='translateY(-4px)'" onmouseleave="this.style.boxShadow='';this.style.transform=''">
                        @if ($sector->icon_image)
                            <img src="{{ asset('storage/'.$sector->icon_image) }}" alt="{{ $sector->title }}" class="sectorIcon">
                        @else
                            <span class="sectorIcon">{{ $sector->icon }}</span>
                        @endif
                        <b>{{ $sector->title }}</b>
                        <p style="font-size:13px;color:var(--muted);line-height:1.5;margin:4px 0 12px">{{ Str::limit($sector->description, 100) }}</p>
                        <span style="color:#f7941d;font-weight:700;font-size:13px">İncele →</span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
<section class="cta">
    <div class="wrap">
        <div><h2>Sektörünüze Özel Çözüm Alın</h2><p>Sahanızı ve ihtiyacınızı birlikte değerlendirelim.</p></div>
        <a class="btn orange" href="{{ route('contact.index') }}#teklif">Teklif Al →</a>
    </div>
</section>
</x-app-layout>
