<x-app-layout>
<section id="anasayfa" class="hero">
    @if ($heroSlides->isNotEmpty())
        @foreach ($heroSlides as $slide)
            <div class="wrap heroGrid heroSlide @if ($loop->first) active @endif">
                <div>
                    @if ($slide->eyebrow)<p class="eyebrow">— {{ $slide->eyebrow }}</p>@endif
                    @if ($slide->title)<h1>{!! nl2br(e($slide->title)) !!}</h1>@endif
                    @if ($slide->subtitle)<p>{{ $slide->subtitle }}</p>@endif
                    <div class="actions">
                        @if ($slide->primary_btn_text)
                            <a class="btn orange" href="{{ $slide->primary_btn_url ?: '#hizmetler' }}">{{ $slide->primary_btn_text }} →</a>
                        @endif
                        @if ($slide->secondary_btn_text)
                            <a class="btn outline" href="{{ $slide->secondary_btn_url ?: route('contact.index') }}">{{ $slide->secondary_btn_text }}</a>
                        @endif
                    </div>
                </div>
                <div class="heroArt" @if ($slide->image) style="background-image:url('{{ asset('storage/'.$slide->image) }}');background-size:cover;background-position:center" @endif>
                    @unless ($slide->image)
                        <div class="security"><div class="cap"></div><div class="head"></div><div class="body">ÖZEL<br>GÜVENLİK</div></div>
                        <div class="building"></div>
                    @endunless
                </div>
            </div>
        @endforeach
        @if ($heroSlides->count() > 1)
            <button class="heroArrow prev" aria-label="Önceki slayt">‹</button>
            <button class="heroArrow next" aria-label="Sonraki slayt">›</button>
            <div class="heroDots">
                @foreach ($heroSlides as $slide)
                    <button class="heroDot @if ($loop->first) active @endif" aria-label="Slayt {{ $loop->iteration }}"></button>
                @endforeach
            </div>
        @endif
    @else
        <div class="wrap heroGrid heroSlide active">
            <div>
                <p class="eyebrow">— {{ $content->hero_eyebrow }}</p>
                <h1>{!! nl2br(e($content->hero_title)) !!}</h1>
                <p>{{ $content->hero_subtitle }}</p>
                <div class="actions">
                    @if ($content->hero_primary_btn_text)
                        <a class="btn orange" href="{{ $content->hero_primary_btn_url ?: '#hizmetler' }}">{{ $content->hero_primary_btn_text }} →</a>
                    @endif
                    @if ($content->hero_secondary_btn_text)
                        <a class="btn outline" href="{{ $content->hero_secondary_btn_url ?: route('contact.index') }}">{{ $content->hero_secondary_btn_text }}</a>
                    @endif
                </div>
            </div>
            <div class="heroArt">
                <div class="security"><div class="cap"></div><div class="head"></div><div class="body">ÖZEL<br>GÜVENLİK</div></div>
                <div class="building"></div>
            </div>
        </div>
    @endif
</section>

<section id="hizmetler" class="section">
    <div class="wrap center">
        <p class="label">HİZMETLERİMİZ</p>
        <h2>İhtiyacınıza Özel Kurumsal Çözümler</h2>
        <p class="lead">İşletmelerin ve yaşam alanlarının ihtiyaç duyduğu temel hizmetleri tek çatı altında, güvenilir ve profesyonel biçimde sunuyoruz.</p>
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
                    <a href="{{ route('services.show', $service) }}">Detaylı Bilgi →</a>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section id="hakkimizda" class="section about">
    <div class="wrap split">
        <div class="collage">
            @if ($content->about_image)
                <div class="office" style="background-image:url('{{ asset('storage/'.$content->about_image) }}');background-size:cover;background-position:center"></div>
            @else
                <div class="office">SAY<br><small>KURUMSAL</small></div>
            @endif
            @if ($content->about_image_secondary)
                <div class="worker" style="background-image:url('{{ asset('storage/'.$content->about_image_secondary) }}');background-size:cover;background-position:center"></div>
            @else
                <div class="worker">Profesyonel<br>Hizmet</div>
            @endif
        </div>
        <div>
            <p class="label">{{ $content->about_label }}</p>
            <h2>{{ $content->about_title }}</h2>
            <p>{{ $content->about_text }}</p>
            @if ($features->isNotEmpty())
                <div class="checks">
                    @foreach ($features as $feature)
                        <b>◉ {{ $feature->title }}</b>
                    @endforeach
                </div>
            @endif
            <a class="btn orange" href="{{ route('page.kurumsal') }}">Hakkımızda →</a>
        </div>
    </div>
</section>

@if ($features->isNotEmpty())
<section id="neden" class="why">
    <div class="wrap">
        <p class="label">{{ $content->why_label }}</p>
        <h2>{!! nl2br(e($content->why_title)) !!}</h2>
        <p>{{ $content->why_text }}</p>
        <div class="features">
            @foreach ($features as $feature)
                <div>{{ $feature->icon }} <b>{{ $feature->title }}</b></div>
            @endforeach
        </div>
    </div>
</section>
@endif

@if ($steps->isNotEmpty())
<section class="section process">
    <div class="wrap">
        <p class="label">{{ $content->process_label }}</p>
        <h2>{{ $content->process_title }}</h2>
        <p>{{ $content->process_text }}</p>
        <div class="steps">
            @foreach ($steps as $step)
                <div><i>{{ $loop->iteration }}</i><b>{{ $step->title }}</b><span>{{ $step->description }}</span></div>
            @endforeach
        </div>
    </div>
</section>
@endif

@if ($faqs->isNotEmpty())
<section class="faq section">
    <div class="wrap faqgrid">
        <div>
            <p class="label">SIKÇA SORULAN SORULAR</p>
            <h2>Merak Ettikleriniz<br>Burada</h2>
            <p>Hizmetlerimizle ilgili en çok sorulan soruların cevaplarını sizin için derledik.</p>
        </div>
        <div class="accord">
            @foreach ($faqs as $faq)
                <details @if ($loop->first) open @endif>
                    <summary>{{ $faq->question }}</summary>
                    <p>{{ $faq->answer }}</p>
                </details>
            @endforeach
        </div>
    </div>
</section>
@endif

@if ($stats->isNotEmpty())
<section class="section stats">
    <div class="wrap center">
        <p class="label">RAKAMLARLA SAY KURUMSAL</p>
        <h2>Gücümüzü Gerçek Verilerle Gösterelim</h2>
        <div class="statsgrid">
            @foreach ($stats as $stat)
                <div class="stat"><strong>{{ $stat->value }}</strong><span>{{ $stat->label }}</span></div>
            @endforeach
        </div>
    </div>
</section>
@endif

@if ($sectors->isNotEmpty())
<section class="section">
    <div class="wrap center">
        <p class="label">HİZMET VERDİĞİMİZ SEKTÖRLER</p>
        <h2>Her Sektöre Özel Operasyon Modeli</h2>
        <div class="sectorgrid">
            @foreach ($sectors as $sector)
                <div class="sector">
                    @if ($sector->icon_image)
                        <img src="{{ asset('storage/'.$sector->icon_image) }}" alt="{{ $sector->title }}" class="sectorIcon">
                    @else
                        <span class="sectorIcon">{{ $sector->icon }}</span>
                    @endif
                    <b>{{ $sector->title }}</b><a href="{{ route('sectors.index') }}#{{ $sector->slug }}">İncele →</a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@if ($certificates->isNotEmpty())
<section class="section stats">
    <div class="wrap center">
        <p class="label">BELGELER &amp; YETKİNLİKLER</p>
        <h2>Kalite ve Mevzuat Güvencesi</h2>
        <div class="certgrid">
            @foreach ($certificates as $certificate)
                <div class="cert">
                    @if ($certificate->image)
                        <img src="{{ asset('storage/'.$certificate->image) }}" alt="{{ $certificate->title }}" style="max-height:64px;margin-bottom:10px">
                    @else
                        <div class="placeholder-logo">{{ $certificate->category }}</div>
                    @endif
                    <b>{{ $certificate->title }}</b>
                    <span>{{ $certificate->description }}</span>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@if ($referenceLogos->isNotEmpty() || $featuredProjects->isNotEmpty())
<section class="section">
    <div class="wrap center">
        <p class="label">REFERANSLAR &amp; BAŞARI HİKÂYELERİ</p>
        <h2>Güvene Dayalı İş Ortaklıkları</h2>
        <div class="casegrid">
            @foreach ($referenceLogos as $logo)
                <div class="case">
                    @if ($logo->logo)
                        <img src="{{ asset('storage/'.$logo->logo) }}" alt="{{ $logo->name }}" style="max-height:40px">
                    @else
                        <b>{{ $logo->name }}</b>
                    @endif
                </div>
            @endforeach
            @foreach ($featuredProjects as $project)
                <div class="case">
                    <b>{{ $project->title }}</b>
                    <p>{{ $project->summary }}</p>
                    <a href="{{ route('projects.show', $project) }}">Detay →</a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<section class="section quoteform" id="hizli-teklif">
    <div class="wrap">
        <p class="label">HIZLI TEKLİF</p>
        <h2>İhtiyacınızı Anlatalım, Size Özel Planlayalım</h2>
        <form class="formgrid ajax-form" action="{{ route('contact.quote') }}" method="post">
            @csrf
            <input class="hp" name="website" tabindex="-1" autocomplete="off">
            <select name="service">
                <option value="">Hizmet seçin</option>
                @foreach ($services as $service)
                    <option>{{ $service->title }}</option>
                @endforeach
            </select>
            <select name="sector">
                <option value="">Sektör seçin</option>
                @foreach ($sectors as $sector)
                    <option>{{ $sector->title }}</option>
                @endforeach
            </select>
            <input name="city" placeholder="Şehir / İlçe">
            <input name="staff_need" placeholder="Yaklaşık personel ihtiyacı">
            <input name="name" placeholder="Ad Soyad" required>
            <input type="tel" name="phone" placeholder="Telefon" required>
            <input class="wide" type="email" name="email" placeholder="E-posta">
            <textarea class="wide" name="message" placeholder="Kısaca ihtiyacınızı anlatın"></textarea>
            <label class="wide legal"><input type="checkbox" required> İletişim amacıyla kişisel verilerimin işlenmesine ilişkin aydınlatma metnini okudum.</label>
            <div class="form-status wide" aria-live="polite"></div>
            <div class="wide"><button class="btn orange" type="submit">Teklif Talebi Gönder →</button></div>
        </form>
    </div>
</section>

<section id="iletisim" class="cta">
    <div class="wrap">
        <div>
            <h2>İş Ortaklığımızla Fark Yaratın</h2>
            <p>İhtiyaçlarınıza özel çözümler için hemen bizimle iletişime geçin.</p>
        </div>
        <a class="btn orange" href="{{ route('contact.index') }}">Teklif Al →</a>
        @if ($siteSetting->phone_primary)
            <b>☎ Hemen Arayın<br>{{ $siteSetting->phone_primary }}</b>
        @endif
    </div>
</section>
</x-app-layout>
