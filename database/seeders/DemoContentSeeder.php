<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\Certificate;
use App\Models\Faq;
use App\Models\HeroSlide;
use App\Models\HomeContent;
use App\Models\HomeFeature;
use App\Models\JobPosting;
use App\Models\Page;
use App\Models\ProcessStep;
use App\Models\Sector;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Stat;
use Illuminate\Database\Seeder;

class DemoContentSeeder extends Seeder
{
    public function run(): void
    {
        Setting::current()->update([
            'phone_primary' => '0216 482 80 61',
            'phone_secondary' => '0532 485 42 94',
            'whatsapp' => '905324854294',
            'email' => 'say@saygikurumsal.com',
            'address' => 'Hasanpaşa Mahallesi, Nabizade Sokak No:82/A Kadıköy / İstanbul',
            'footer_text' => 'Yaşam alanlarınız için kurumsal çözümler.',
            'seo_title' => 'SAY Kurumsal | Profesyonel Kurumsal Hizmetler',
            'seo_description' => 'SAY Kurumsal; özel güvenlik, tesis yönetimi, temizlik, personel bordrolama ve turizm taşımacılık alanlarında kurumsal çözümler sunar.',
        ]);

        HomeContent::current()->update([
            'hero_eyebrow' => 'DAHA GÜVENLİ, DAHA KONFORLU ORTAMLAR',
            'hero_title' => "Yaşam Alanlarınızda\nProfesyonel Çözümler",
            'hero_subtitle' => 'SAY Kurumsal olarak güvenlik, temizlik, tesis yönetimi, personel bordrolama ve turizm taşımacılık alanlarında kurumsal çözümler sunuyoruz.',
            'hero_primary_btn_text' => 'Hizmetlerimizi Keşfedin',
            'hero_primary_btn_url' => '#hizmetler',
            'hero_secondary_btn_text' => 'Bizimle İletişime Geçin',
            'hero_secondary_btn_url' => null,
            'about_label' => 'HAKKIMIZDA',
            'about_title' => 'Yaşamın Her Alanında Yanınızdayız',
            'about_text' => 'SAY Kurumsal, farklı sektörlerdeki deneyimi ve uzman ekibi ile kurumların ihtiyaç duyduğu destek hizmetlerini tek çatı altında sunan çözüm ortağınızdır. Kalite, güven, sürdürülebilirlik ve müşteri memnuniyeti ilkelerimizle yaşam alanlarınızı daha güvenli, temiz ve verimli hale getiriyoruz.',
            'experience_years' => '10+',
            'why_label' => 'NEDEN SAY KURUMSAL?',
            'why_title' => "Bizi Tercih Etmeniz İçin\nÇok Neden Var",
            'why_text' => 'Profesyonel ekibimiz, yenilikçi çözümlerimiz ve güçlü operasyon altyapımız ile her zaman yanınızdayız.',
            'process_label' => 'ÇALIŞMA SÜRECİMİZ',
            'process_title' => 'Kolay ve Etkili Çözüm Süreci',
            'process_text' => 'İhtiyaçlarınızı en iyi şekilde anlayarak, size özel çözümlerle hızlı ve etkili bir hizmet sunuyoruz.',
        ]);

        HeroSlide::create([
            'eyebrow' => 'DAHA GÜVENLİ, DAHA KONFORLU ORTAMLAR',
            'title' => "Yaşam Alanlarınızda\nProfesyonel Çözümler",
            'subtitle' => 'SAY Kurumsal olarak güvenlik, temizlik, tesis yönetimi, personel bordrolama ve turizm taşımacılık alanlarında kurumsal çözümler sunuyoruz.',
            'primary_btn_text' => 'Hizmetlerimizi Keşfedin',
            'primary_btn_url' => '#hizmetler',
            'secondary_btn_text' => 'Bizimle İletişime Geçin',
            'order' => 0,
            'is_active' => true,
        ]);

        $features = [
            ['icon' => '🛡️', 'title' => 'Güvenilir ve Şeffaf Hizmet'],
            ['icon' => '👥', 'title' => 'Uzman ve Deneyimli Kadro'],
            ['icon' => '⚙️', 'title' => 'Tek Noktadan Entegre Çözümler'],
            ['icon' => '🎧', 'title' => 'Hızlı Destek ve Kesintisiz İletişim'],
        ];
        foreach ($features as $i => $feature) {
            HomeFeature::create([...$feature, 'order' => $i]);
        }

        $steps = [
            ['title' => 'İhtiyacınızı Belirleyin', 'description' => 'Talep ve beklentilerinizi bizimle paylaşın.'],
            ['title' => 'Planlama Yapalım', 'description' => 'Size özel çözüm planını oluşturalım.'],
            ['title' => 'Uygulamaya Geçelim', 'description' => 'Profesyonel ekibimiz hizmeti başlatsın.'],
            ['title' => 'Memnuniyetinizi Sağlayalım', 'description' => 'Sürekli destek ile yanınızda olalım.'],
        ];
        foreach ($steps as $i => $step) {
            ProcessStep::create([...$step, 'order' => $i]);
        }

        $services = [
            [
                'title' => 'Özel Güvenlik Hizmetleri', 'icon' => '🛡️', 'icon_image' => 'services/ozel-guvenlik.svg',
                'short_desc' => 'Güvenli yaşam alanları, huzurlu yarınlar.',
                'content' => 'İhtiyaç analiziyle başlayan, planlama, uygulama ve raporlama ile devam eden uçtan uca hizmet yaklaşımı.',
                'items' => ['Site ve Konut Güvenliği', 'Plaza ve Ofis Güvenliği', 'Fabrika ve Endüstriyel Tesis Güvenliği', 'Etkinlik Güvenliği'],
            ],
            [
                'title' => 'Tesis Yönetimi', 'icon' => '🏢', 'icon_image' => 'services/tesis-yonetimi.svg',
                'short_desc' => 'Profesyonel yönetim, sürdürülebilir değer.',
                'content' => 'Teknik bakım, enerji verimliliği ve günlük operasyon süreçlerini tek elden yönetiyoruz.',
                'items' => ['Teknik Bakım ve Onarım', 'Enerji Yönetimi', 'Ortak Alan Yönetimi', 'Acil Durum Planlaması'],
            ],
            [
                'title' => 'Temizlik Hizmetleri', 'icon' => '🧹', 'icon_image' => 'services/temizlik.svg',
                'short_desc' => 'Daha temiz, daha sağlıklı ortamlar.',
                'content' => 'İhtiyaca göre günlük, periyodik veya proje bazlı temizlik planlaması yapıyoruz.',
                'items' => ['Genel Temizlik', 'Cam ve Cephe Temizliği', 'Endüstriyel Temizlik', 'Peyzaj ve Çevre Düzenleme'],
            ],
            [
                'title' => 'Personel Bordrolama', 'icon' => '👥', 'icon_image' => 'services/personel-bordrolama.svg',
                'short_desc' => 'İnsan kaynağınız bizimle güvende.',
                'content' => 'Kuruma özel süreç analizi sonrasında bordro operasyonu için uygun kapsam belirlenir.',
                'items' => ['Bordro Hesaplama', 'SGK ve Yasal Bildirimler', 'Özlük Dosyası Yönetimi', 'Danışmanlık'],
            ],
            [
                'title' => 'Turizm Taşımacılık', 'icon' => '🚌', 'icon_image' => 'services/turizm-tasimacilik.svg',
                'short_desc' => 'Güvenli, konforlu ve zamanında ulaşım.',
                'content' => 'Kurumsal ihtiyaçlara göre güvenli ve planlı ulaşım çözümleri sunuyoruz.',
                'items' => ['Personel Servisi', 'VIP Transfer', 'Turizm Taşımacılığı', 'Filo Yönetimi'],
            ],
        ];
        foreach ($services as $i => $data) {
            $items = $data['items'];
            unset($data['items']);
            $service = Service::create([...$data, 'order' => $i, 'is_active' => true]);
            foreach ($items as $j => $title) {
                $service->items()->create([
                    'title' => $title,
                    'description' => 'Saha analizi, operasyon planlaması, uygun ekip ve düzenli kalite kontrol süreçleriyle kurumunuza özel çözüm geliştiriyoruz.',
                    'order' => $j,
                ]);
            }
        }

        $sectors = [
            ['title' => 'Fabrika & Sanayi', 'icon' => '🏭', 'icon_image' => 'sectors/fabrika-sanayi.svg', 'description' => 'Güvenlik, temizlik, teknik destek ve tesis operasyonlarının üretim sürekliliğini destekleyecek şekilde planlanması.'],
            ['title' => 'Plaza & Ofis', 'icon' => '🏢', 'icon_image' => 'sectors/plaza-ofis.svg', 'description' => 'Kurumsal çalışma alanlarında temsil kalitesi, hijyen, güvenlik ve günlük tesis yönetimi.'],
            ['title' => 'Site & Rezidans', 'icon' => '🏘️', 'icon_image' => 'sectors/site-rezidans.svg', 'description' => 'Ortak yaşam alanlarında güvenli, düzenli ve sürdürülebilir hizmet yönetimi.'],
            ['title' => 'Sağlık', 'icon' => '🏥', 'icon_image' => 'sectors/saglik.svg', 'description' => 'Yoğun insan trafiği bulunan sağlık yapılarında disiplinli ve ihtiyaca özel operasyon yaklaşımı.'],
            ['title' => 'AVM & Perakende', 'icon' => '🛍️', 'icon_image' => 'sectors/avm-perakende.svg', 'description' => 'Ziyaretçi deneyimi ve operasyon sürekliliğini birlikte gözeten saha hizmetleri.'],
            ['title' => 'Eğitim', 'icon' => '🎓', 'icon_image' => 'sectors/egitim.svg', 'description' => 'Öğrenci, çalışan ve ziyaretçilerin bulunduğu alanlara uygun güvenlik ve destek hizmetleri.'],
            ['title' => 'Lojistik & Depo', 'icon' => '📦', 'icon_image' => 'sectors/lojistik-depo.svg', 'description' => 'Giriş-çıkış kontrolü, saha düzeni ve operasyon ihtiyaçlarına uygun destek hizmetleri.'],
            ['title' => 'Otel & Turizm', 'icon' => '🏨', 'icon_image' => 'sectors/otel-turizm.svg', 'description' => 'Misafir deneyimine uygun, görünürlük ve hizmet kalitesini önemseyen operasyon modeli.'],
        ];
        foreach ($sectors as $i => $data) {
            Sector::create([...$data, 'order' => $i]);
        }

        $allSectorIds = Sector::pluck('id')->all();
        foreach (Service::all() as $service) {
            $service->sectors()->sync($allSectorIds);
        }

        $certificates = [
            ['title' => 'Faaliyet / Yetki Belgeleri', 'category' => 'Yetki Belgesi', 'description' => 'Gerçek belge bilgileri eklenecek.'],
            ['title' => 'ISO / Kalite Belgeleri', 'category' => 'ISO', 'description' => 'Mevcut sertifikalar eklenecek.'],
            ['title' => 'İSG & Uyum', 'category' => 'İSG', 'description' => 'Uygunluk dokümanları eklenecek.'],
            ['title' => 'Kurumsal Yetkinlikler', 'category' => 'Diğer', 'description' => 'Doğrulanmış belgeler eklenecek.'],
        ];
        foreach ($certificates as $i => $data) {
            Certificate::create([...$data, 'order' => $i]);
        }

        $stats = [
            ['label' => 'Yıllık deneyim', 'value' => '10+'],
            ['label' => 'Aktif proje / lokasyon', 'value' => '—'],
            ['label' => 'Çalışan sayısı', 'value' => '—'],
            ['label' => 'Hizmet verilen il', 'value' => '—'],
        ];
        foreach ($stats as $i => $data) {
            Stat::create([...$data, 'order' => $i]);
        }

        $faqs = [
            ['question' => 'Özel güvenlik hizmetleriniz hangi alanları kapsıyor?', 'answer' => 'Site, plaza, fabrika, okul, hastane gibi yaşam ve çalışma alanlarında mevzuata uygun özel güvenlik hizmeti sunuyoruz.'],
            ['question' => 'Temizlik hizmetlerinizi hangi periyotlarla sunuyorsunuz?', 'answer' => 'İhtiyaca göre günlük, periyodik veya proje bazlı planlama yapılabilir.'],
            ['question' => 'Personel bordrolama hizmetiniz neleri kapsıyor?', 'answer' => 'Kuruma özel süreç analizi sonrasında bordro operasyonu için uygun kapsam belirlenir.'],
            ['question' => 'Turizm taşımacılık hizmetleriniz nasıl?', 'answer' => 'Kurumsal ihtiyaçlara göre güvenli ve planlı ulaşım çözümleri sunuyoruz.'],
            ['question' => 'Fiyatlandırma nasıl belirleniyor?', 'answer' => 'Hizmet kapsamı, personel, süre ve operasyon gereksinimlerine göre teklif hazırlanır.'],
        ];
        foreach ($faqs as $i => $data) {
            Faq::create([...$data, 'order' => $i, 'is_active' => true]);
        }

        $category = BlogCategory::create(['name' => 'Kurumsal']);
        $posts = [
            'Özel Güvenlik Hizmetlerinde Yeni Dönem',
            'Profesyonel Temizlik Hizmetlerinin İşletmelere Katkısı',
            'Personel Taşımacılığında Güvenlik ve Konforun Önemi',
            'Tesis Yönetiminde Verimlilik',
            'Personel Bordrolamada Doğru Süreç',
            'Sürdürülebilir İşletme Yönetimi',
        ];
        foreach ($posts as $i => $title) {
            BlogPost::create([
                'blog_category_id' => $category->id,
                'title' => $title,
                'excerpt' => 'Uzman ekibimizden sektörel bilgi ve uygulama önerileri.',
                'content' => 'Uzman ekibimizden sektörel bilgi ve uygulama önerileri. Bu içerik yönetim panelinden güncellenebilir.',
                'is_published' => true,
                'published_at' => now()->subDays($i * 3),
            ]);
        }

        $jobs = [
            ['title' => 'Özel Güvenlik Görevlisi', 'department' => 'Güvenlik'],
            ['title' => 'Temizlik Personeli', 'department' => 'Temizlik'],
            ['title' => 'Teknik Personel', 'department' => 'Teknik'],
            ['title' => 'Servis Şoförü', 'department' => 'Şoför / Taşımacılık'],
        ];
        foreach ($jobs as $i => $data) {
            JobPosting::create([...$data, 'location' => 'İstanbul', 'employment_type' => 'Tam Zamanlı', 'is_active' => true, 'order' => $i]);
        }

        $kurumsal = Page::create(['title' => 'Kurumsal', 'slug' => 'kurumsal', 'intro' => 'Profesyonel, güvenilir ve sürdürülebilir kurumsal çözümler.']);
        $kurumsalSections = [
            ['anchor' => 'hakkimizda', 'title' => 'SAY Kurumsal Hakkında', 'content' => 'Güvenlikten tesis yönetimine, temizlikten insan kaynakları operasyonlarına ve taşımacılığa kadar farklı ihtiyaçları tek çatı altında yönetiyoruz.'],
            ['anchor' => 'vizyon', 'title' => 'Vizyon & Misyon', 'content' => 'Uzun vadeli iş ortaklıkları kuran, ölçülebilir kalite sunan ve insan odaklı hizmet anlayışıyla değer üreten çözüm ortağı olmak.'],
            ['anchor' => 'degerler', 'title' => 'Değerlerimiz', 'content' => 'Güven, şeffaflık, profesyonellik, sürdürülebilirlik ve müşteri memnuniyeti.'],
            ['anchor' => 'kalite', 'title' => 'Kalite Yaklaşımımız', 'content' => 'Operasyonlarımızı düzenli kontrol, raporlama ve sürekli iyileştirme yaklaşımıyla yönetiyoruz.'],
        ];
        foreach ($kurumsalSections as $i => $data) {
            $kurumsal->sections()->create([...$data, 'order' => $i]);
        }

        $surdurulebilirlik = Page::create(['title' => 'Sürdürülebilirlik', 'slug' => 'surdurulebilirlik', 'intro' => 'Sürdürülebilirliği ekonomik, sosyal ve çevresel sorumlulukların birlikte yönetildiği uzun vadeli bir iş yaklaşımı olarak ele alıyoruz.']);
        $sustainSections = [
            ['anchor' => 'strateji', 'title' => 'Sürdürülebilirlik Stratejimiz'],
            ['anchor' => 'insan', 'title' => 'İnsan ve Çalışan Gelişimi'],
            ['anchor' => 'cevre', 'title' => 'Çevresel Sorumluluk'],
            ['anchor' => 'etik', 'title' => 'Etik ve Şeffaflık'],
            ['anchor' => 'toplum', 'title' => 'Toplumsal Katkı'],
            ['anchor' => 'raporlama', 'title' => 'Hedefler ve Raporlama'],
        ];
        foreach ($sustainSections as $i => $data) {
            $surdurulebilirlik->sections()->create([
                ...$data,
                'content' => 'Bu alandaki yaklaşımımızı operasyonlarımıza, çalışan deneyimine ve müşteri çözümlerimize entegre ediyor; ölçülebilir gelişim ve sürekli iyileştirmeyi esas alıyoruz.',
                'order' => $i,
            ]);
        }

        $kvkk = Page::create(['title' => 'KVKK ve Gizlilik', 'slug' => 'kvkk', 'intro' => 'Bu sayfa hukuki metinlerin yayınlanması için hazırlanmış taslak alandır.']);
        $kvkk->sections()->create([
            'anchor' => 'aydinlatma',
            'title' => 'Aydınlatma Metni',
            'content' => 'Aydınlatma metni, çalışan adayı aydınlatma metni, açık rıza gerektiren süreçler, gizlilik politikası ve çerez politikası şirketin hukuk danışmanı tarafından onaylanan nihai metinlerle doldurulmalıdır.',
            'order' => 0,
        ]);
    }
}
