<!doctype html>
<html lang="tr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>{{ $title ? $title.' | SAY Kurumsal' : ($siteSetting->seo_title ?: 'SAY Kurumsal | Profesyonel Kurumsal Hizmetler') }}</title>
<meta name="description" content="{{ $description ?: $siteSetting->seo_description }}">
@if ($keywords)
    <meta name="keywords" content="{{ $keywords }}">
@endif
<meta name="theme-color" content="#102d4e">
<link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
<a class="skip-link" href="#main">İçeriğe geç</a>
<div class="top">
    <div class="wrap topin">
        @if ($siteSetting->phone_primary)
            <span><x-icon name="phone" /><a href="tel:{{ preg_replace('/\s+/', '', $siteSetting->phone_primary) }}">{{ $siteSetting->phone_primary }}</a></span>
        @endif
        @if ($siteSetting->phone_secondary)
            <span><x-icon name="mobile" /><a href="tel:{{ preg_replace('/\s+/', '', $siteSetting->phone_secondary) }}">{{ $siteSetting->phone_secondary }}</a></span>
        @endif
        @if ($siteSetting->email)
            <span><x-icon name="mail" /><a href="mailto:{{ $siteSetting->email }}">{{ $siteSetting->email }}</a></span>
        @endif
        @if ($siteSetting->address)
            <span class="push"><x-icon name="pin" />{{ $siteSetting->address }}</span>
        @endif
    </div>
</div>
<header>
    <div class="wrap nav">
        <a class="brand" href="{{ route('home') }}">
            @if ($siteSetting->logo_path)
                <img src="{{ asset('storage/'.$siteSetting->logo_path) }}" alt="SAY Kurumsal" style="height:42px">
            @else
                <span class="mark"><i></i><i></i><i></i></span><b>SAY<small>KURUMSAL</small></b>
            @endif
        </a>
        <button class="hamb" type="button" aria-label="Menüyü aç" aria-expanded="false">☰</button>
        <nav>
            <a href="{{ route('home') }}" class="@if(request()->routeIs('home')) active @endif">ANASAYFA</a>
            <span class="hasdrop @if(request()->routeIs('page.kurumsal')) active @endif">
                <a href="{{ route('page.kurumsal') }}">KURUMSAL</a>
                <button type="button" class="dropToggle" aria-label="Kurumsal alt menüsünü aç">▾</button>
                <span class="drop drop-mega-icons">
                    <a href="{{ route('page.kurumsal') }}#hakkimizda">
                        <span class="drop-icon-wrap"><x-icon name="info" /></span>
                        <span>Hakkımızda<small style="display:block;font-size:11px;color:#7a8caa;font-weight:400">Şirket ve ekip</small></span>
                    </a>
                    <a href="{{ route('page.kurumsal') }}#vizyon">
                        <span class="drop-icon-wrap"><x-icon name="flag" /></span>
                        <span>Vizyon &amp; Misyon<small style="display:block;font-size:11px;color:#7a8caa;font-weight:400">Hedeflerimiz</small></span>
                    </a>
                    <a href="{{ route('page.kurumsal') }}#degerler">
                        <span class="drop-icon-wrap"><x-icon name="star" /></span>
                        <span>Değerlerimiz<small style="display:block;font-size:11px;color:#7a8caa;font-weight:400">İlkelerimiz</small></span>
                    </a>
                </span>
            </span>
            <span class="hasdrop @if(request()->routeIs('services.*')) active @endif">
                <a href="{{ route('services.index') }}" title="Faaliyet Alanlarımız / Hizmetlerimiz">HİZMETLERİMİZ</a>
                <button type="button" class="dropToggle" aria-label="Hizmetler alt menüsünü aç">▾</button>
                <span class="drop drop-media">
                    @foreach ($navServices as $navService)
                        <a href="{{ route('services.show', $navService) }}">
                            <span class="drop-thumb">
                                @if ($navService->icon_image)
                                    <img src="{{ asset('storage/'.$navService->icon_image) }}" alt="">
                                @else
                                    {{ $navService->icon }}
                                @endif
                            </span>
                            {{ $navService->title }}
                        </a>
                    @endforeach
                </span>
            </span>
            <a href="{{ route('sectors.index') }}" class="@if(request()->routeIs('sectors.*')) active @endif">SEKTÖRLER</a>
            <a href="{{ route('career.index') }}" class="@if(request()->routeIs('career.*')) active @endif" title="Saygı'da Kariyer">KARİYER</a>
            <a href="{{ route('page.surdurulebilirlik') }}" class="@if(request()->routeIs('page.surdurulebilirlik')) active @endif">SÜRDÜRÜLEBİLİRLİK</a>
            <a href="{{ route('blog.index') }}" class="@if(request()->routeIs('blog.*')) active @endif">BLOG</a>
            <a href="{{ route('contact.index') }}" class="@if(request()->routeIs('contact.*')) active @endif">İLETİŞİM</a>
        </nav>
        <a class="btn navy" href="{{ route('contact.index') }}#teklif">Teklif Al →</a>
    </div>
</header>
<main id="main">
    {{ $slot }}
</main>
<footer>
    <div class="wrap foot">
        <div class="brand footbrand">
            <span class="mark"><i></i><i></i><i></i></span><b>SAY<small>KURUMSAL</small></b>
            <p>{{ $siteSetting->footer_text ?: 'Yaşam alanlarınız için kurumsal çözümler.' }}</p>
        </div>
        <div>
            <h4>Hızlı Bağlantılar</h4>
            <a href="{{ route('page.kurumsal') }}">Kurumsal</a>
            <a href="{{ route('services.index') }}">Hizmetler</a>
            <a href="{{ route('career.index') }}">Kariyer</a>
            <a href="{{ route('page.surdurulebilirlik') }}">Sürdürülebilirlik</a>
        </div>
        <div>
            <h4>Hizmetlerimiz</h4>
            @foreach ($navServices as $navService)
                <a href="{{ route('services.show', $navService) }}">{{ $navService->title }}</a>
            @endforeach
        </div>
        <div>
            <h4>İletişim</h4>
            @if ($siteSetting->phone_primary)
                <a href="tel:{{ preg_replace('/\s+/', '', $siteSetting->phone_primary) }}">{{ $siteSetting->phone_primary }}</a>
            @endif
            @if ($siteSetting->phone_secondary)
                <a href="tel:{{ preg_replace('/\s+/', '', $siteSetting->phone_secondary) }}">{{ $siteSetting->phone_secondary }}</a>
            @endif
            @if ($siteSetting->email)
                <a href="mailto:{{ $siteSetting->email }}">{{ $siteSetting->email }}</a>
            @endif
            <p>{{ $siteSetting->address }}</p>
        </div>
    </div>
    <div class="copy wrap">© {{ date('Y') }} SAY Kurumsal. Tüm hakları saklıdır. <a href="{{ route('page.kvkk') }}" style="color:#9db0d5">KVKK &amp; Gizlilik</a></div>
</footer>
<script src="{{ asset('script.js') }}"></script>
<div class="mobilebar">
    @if ($siteSetting->phone_primary)
        <a href="tel:{{ preg_replace('/\s+/', '', $siteSetting->phone_primary) }}"><x-icon name="phone" /> Ara</a>
    @endif
    @if ($siteSetting->whatsapp)
        <a href="https://wa.me/{{ preg_replace('/\D/', '', $siteSetting->whatsapp) }}"><x-icon name="whatsapp" /> WhatsApp</a>
    @endif
    <a href="{{ route('contact.index') }}#teklif">Teklif Al</a>
</div>
</body>
</html>
