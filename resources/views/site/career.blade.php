<x-app-layout title="Saygı'da Kariyer">
<section class="pagehero">
    <div class="wrap">
        <div class="breadcrumbs">Anasayfa / Saygı'da Kariyer</div>
        <h1>Saygı'da Kariyer</h1>
        <p>Profesyonel, güvenilir ve sürdürülebilir kurumsal çözümler.</p>
    </div>
</section>
<section class="section">
    <div class="wrap">
        <h2>İnsan Kaynakları</h2>
        <p class="lead">SAY Kurumsal'ın büyüyen ekibinde kariyerinize yeni bir adım atın. Açık pozisyonları inceleyebilir veya genel başvuru bırakabilirsiniz.</p>

        <h2>Açık Pozisyonlar</h2>
        <div class="jobs">
            @forelse ($postings as $posting)
                <div class="job">
                    <div>
                        <b>{{ $posting->title }}</b><br>
                        <small>{{ $posting->location }} • {{ $posting->employment_type }}</small>
                    </div>
                    <a class="btn outline" href="#basvuru" onclick="document.querySelector('[name=job_posting_id]').value='{{ $posting->id }}'; document.querySelector('[name=department]').value='{{ $posting->department }}'">Başvur →</a>
                </div>
            @empty
                <p>Şu anda açık pozisyon bulunmuyor. Genel başvuru bırakabilirsiniz.</p>
            @endforelse
        </div>

        <div id="basvuru" class="section">
            <h2>Genel İş Başvuru Formu</h2>
            <form class="formgrid ajax-form" action="{{ route('career.apply') }}" method="post" enctype="multipart/form-data">
                <input class="hp" name="website" tabindex="-1" autocomplete="off">
                <input type="hidden" name="job_posting_id" value="">
                <input required name="name" autocomplete="name" placeholder="Ad Soyad">
                <input required type="tel" name="phone" autocomplete="tel" placeholder="Telefon">
                <input required type="email" name="email" autocomplete="email" placeholder="E-posta">
                <select name="department">
                    <option value="">Departman seçiniz</option>
                    <option>Güvenlik</option>
                    <option>Temizlik</option>
                    <option>Teknik</option>
                    <option>Şoför / Taşımacılık</option>
                    <option>Tesis Yönetimi</option>
                    <option>İnsan Kaynakları</option>
                    <option>İdari İşler</option>
                </select>
                <input class="full" type="file" name="cv" accept=".pdf,.doc,.docx" required>
                <textarea class="full" name="message" placeholder="Kısa ön yazınız"></textarea>
                <label class="full"><input type="checkbox" required> KVKK aydınlatma metnini okudum ve başvuru kapsamında verilerimin işlenmesini kabul ediyorum.</label>
                <div class="form-status" aria-live="polite"></div>
                <button class="btn orange" type="submit">Başvuruyu Gönder →</button>
            </form>
        </div>
    </div>
</section>
</x-app-layout>
