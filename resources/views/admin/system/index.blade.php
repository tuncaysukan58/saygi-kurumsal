<x-admin-layout title="Sistem / Veritabanı">
    <div class="max-w-3xl space-y-6">
        <div class="bg-blue-50 border border-blue-100 text-blue-800 text-sm rounded-lg p-4">
            Bu sayfa, hosting'e yükledikten sonra terminal/SSH erişiminiz olmasa bile veritabanı tablolarını
            oluşturmanızı ve örnek/başlangıç verilerini yüklemenizi sağlar.
        </div>

        @if (session('output'))
            <div class="bg-slate-900 text-slate-100 text-xs rounded-lg p-4 overflow-x-auto whitespace-pre-wrap">{{ session('output') }}</div>
        @endif

        <div class="bg-white rounded-xl border border-slate-200 p-6">
            <h2 class="font-semibold text-slate-700 mb-2">1. Veritabanı Tabloları (Migration)</h2>
            <p class="text-sm text-slate-500 mb-4">Eksik tabloları / sütunları oluşturur. Birden fazla kez çalıştırmak güvenlidir — zaten uygulanmış olanları tekrar çalıştırmaz.</p>
            <form method="POST" action="{{ route('admin.system.migrate') }}" onsubmit="return confirm('Migration çalıştırılsın mı?')">
                @csrf
                <x-primary-button>Migration Çalıştır</x-primary-button>
            </form>
        </div>

        <div class="bg-white rounded-xl border border-slate-200 p-6">
            <h2 class="font-semibold text-slate-700 mb-2">2. Başlangıç / Örnek Veriler (Seeder)</h2>
            @if ($hasDemoData)
                <div class="text-sm text-amber-700 bg-amber-50 border border-amber-100 rounded-lg p-3 mb-4">
                    ⚠️ Veritabanında zaten hizmet/sektör verisi var. Bunu tekrar çalıştırırsanız örnek veriler
                    (hizmetler, sektörler, blog yazıları vb.) <strong>kopyalanabilir</strong>. Sadece veritabanı
                    sıfırdan kurulduysa veya bir admin kullanıcısı oluşturmanız gerekiyorsa çalıştırın.
                </div>
            @else
                <p class="text-sm text-slate-500 mb-4">Veritabanı boş görünüyor. İlk admin kullanıcısını ve örnek içerikleri (hizmetler, sektörler, SSS vb.) yükler.</p>
            @endif
            <form method="POST" action="{{ route('admin.system.seed') }}" onsubmit="return confirm('Seeder çalıştırılsın mı? Bu işlem veri ekleyecektir.')">
                @csrf
                <x-secondary-button>Seeder Çalıştır</x-secondary-button>
            </form>
        </div>

        <div class="bg-white rounded-xl border border-slate-200 p-6">
            <h2 class="font-semibold text-slate-700 mb-2">3. Önbelleği Temizle</h2>
            <p class="text-sm text-slate-500 mb-4">Ayarları veya kodu güncelledikten sonra eski önbellek kalırsa kullanın.</p>
            <form method="POST" action="{{ route('admin.system.clear-cache') }}">
                @csrf
                <x-secondary-button>Önbelleği Temizle</x-secondary-button>
            </form>
        </div>

        <div class="bg-white rounded-xl border border-slate-200 p-6">
            <h2 class="font-semibold text-slate-700 mb-3">Migration Durumu</h2>
            <pre class="text-xs bg-slate-50 rounded-lg p-4 overflow-x-auto whitespace-pre-wrap">{{ $migrateStatus }}</pre>
        </div>
    </div>
</x-admin-layout>
