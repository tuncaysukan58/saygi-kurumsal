# SAY Kurumsal — Laravel Kurumsal Site + Admin Panel

Laravel + MySQL + Blade ile geliştirilmiş, tamamen admin panelinden yönetilebilen kurumsal web sitesi.

## Kurulum

1. `composer install`
2. `.env` dosyasını kontrol edin (varsayılan: MySQL, veritabanı adı `say_kurumsal`, kullanıcı `root`, şifresiz — XAMPP/yerel kurulum için hazır).
3. `php artisan migrate --seed` — tabloları oluşturur ve örnek/başlangıç içeriğini yükler.
4. `php artisan storage:link` — yüklenen görsellerin `public/storage` üzerinden erişilebilir olması için (daha önce çalıştırıldıysa tekrar gerekmez).
5. `npm install && npm run build` (admin panel Tailwind CSS derlemesi için; geliştirirken `npm run dev`).
6. `php artisan serve` ile siteyi çalıştırın.

## Giriş Bilgileri (ilk kurulum)

- Panel adresi: `/admin`
- E-posta: `admin@saygikurumsal.com`
- Şifre: `SayKurumsal2026!`

**Bu şifreyi ilk girişten hemen sonra "Hesabım" sayfasından değiştirin.**

## Terminal/SSH Olmadan Migration & Seed Çalıştırma

**İlk kurulum** (veritabanı tamamen boş, henüz hiçbir admin kullanıcısı yok) için en az bir kez `php artisan migrate --seed` komutunun bir şekilde çalıştırılması gerekir — bu olmadan `/admin`'e giriş yapılamaz, çünkü `users` tablosu ve ilk admin kullanıcısı bu komutla oluşur. Hosting'inizde SSH yoksa, bunu hosting panelinizin sunduğu "Cron Job" veya "Terminal/Console" özelliğinden tek seferlik tetikleyin (çoğu paylaşımlı hosting'de cPanel → "Cron Jobs" veya "Setup Node.js/PHP App" altında bulunur).

**Sonraki güncellemeler için** (admin girişi zaten çalışıyor, sadece yeni eklenen migration'ları uygulamak istiyorsunuz): terminale hiç gerek yok — **Yönetim Paneli → Sistem / Veritabanı** sayfasından tek tıkla migration çalıştırabilir, önbelleği temizleyebilirsiniz.

## Yapı

- `routes/site.php` — kurumsal sitenin herkese açık sayfaları (anasayfa, hizmetler, sektörler, projeler, blog, kariyer, iletişim, kurumsal/sürdürülebilirlik/kvkk sayfaları).
- `routes/admin.php` — `/admin` altındaki yönetim paneli (auth korumalı).
- `app/Http/Controllers/Site` — herkese açık sayfa controller'ları.
- `app/Http/Controllers/Admin` — admin CRUD controller'ları (her modül için ayrı).
- `resources/views/site` — herkese açık sayfa şablonları.
- `resources/views/admin` — admin panel şablonları.
- `database/seeders/DemoContentSeeder.php` — ilk kurulumda yüklenen örnek içerik (hizmetler, sektörler, SSS, blog vb.) — admin panelden gerçek verilerle değiştirilmelidir.
- `legacy-static/` — projenin dayandığı orijinal statik HTML taslağı (referans amaçlı, siteye dahil değildir).

## Admin Panelden Yönetilebilenler

Site ayarları (logo, telefon, adres, sosyal medya), anasayfa metinleri, hizmetler ve alt hizmetleri, sektörler, projeler/başarı hikâyeleri, belgeler, rakamlar, referans logoları, SSS, blog yazıları/kategorileri, açık pozisyonlar, kariyer başvuruları (CV indirme dahil), kurumsal/sürdürülebilirlik/KVKK sayfa içerikleri, gelen teklif talepleri ve iletişim mesajları, panel kullanıcıları.

## Notlar

- Kariyer başvuru formundaki CV dosyaları `storage/app/private/cv` altında saklanır (herkese açık değildir, sadece admin panelden indirilebilir).
- Form gönderimlerinde (teklif, iletişim, kariyer) admin e-posta adresine bildirim gönderilir (`MAIL_MAILER` ayarına göre; geliştirmede varsayılan `log` sürücüsü `storage/logs/laravel.log` dosyasına yazar — üretimde gerçek bir SMTP servisi tanımlanmalıdır).
- KVKK sayfası içeriği taslaktır, yayına almadan önce şirketin hukuk danışmanı tarafından onaylanmalıdır.
