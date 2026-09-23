<x-app-layout title="İletişim">
<section class="pagehero">
    <div class="wrap">
        <div class="breadcrumbs">Anasayfa / İletişim</div>
        <h1>İletişim</h1>
        <p>Profesyonel, güvenilir ve sürdürülebilir kurumsal çözümler.</p>
    </div>
</section>
<section class="section">
    <div class="wrap contactgrid">
        <div>
            <h2>Bizimle İletişime Geçin</h2>
            <div class="contactcards">
                @if ($siteSetting->phone_primary || $siteSetting->phone_secondary)
                    <div class="contactcard">
                        <b>Telefon</b>
                        <p>{{ $siteSetting->phone_primary }}@if($siteSetting->phone_secondary)<br>{{ $siteSetting->phone_secondary }}@endif</p>
                    </div>
                @endif
                @if ($siteSetting->email)
                    <div class="contactcard"><b>E-posta</b><p>{{ $siteSetting->email }}</p></div>
                @endif
                @if ($siteSetting->address)
                    <div class="contactcard"><b>Adres</b><p>{{ $siteSetting->address }}</p></div>
                @endif
            </div>
        </div>
        <div id="teklif">
            <h2>İletişim / Teklif Formu</h2>
            <form class="formgrid ajax-form" action="{{ route('contact.send') }}" method="post">
                @csrf
                <input class="hp" name="website" tabindex="-1" autocomplete="off">
                <input required name="name" autocomplete="name" placeholder="Ad Soyad">
                <input name="company" autocomplete="organization" placeholder="Firma">
                <input required type="tel" name="phone" autocomplete="tel" placeholder="Telefon">
                <input required type="email" name="email" autocomplete="email" placeholder="E-posta">
                <select class="full" name="service">
                    <option value="">Hizmet seçiniz</option>
                    @foreach ($navServices as $navService)
                        <option>{{ $navService->title }}</option>
                    @endforeach
                </select>
                <textarea class="full" name="message" required placeholder="Mesajınız"></textarea>
                <label class="full legal"><input type="checkbox" required> KVKK aydınlatma metnini okudum; iletişim talebimin yanıtlanması amacıyla bilgilerimin işlenmesini kabul ediyorum.</label>
                <div class="form-status" aria-live="polite"></div>
                <button class="btn orange">Gönder →</button>
            </form>
        </div>
    </div>
    @if ($siteSetting->address)
        <div class="contactmap-wrap" style="margin-top:40px">
            <iframe class="map" loading="lazy" src="https://www.google.com/maps?q={{ urlencode($siteSetting->address) }}&output=embed"></iframe>
        </div>
    @endif
</section>
</x-app-layout>
