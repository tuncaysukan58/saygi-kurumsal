@props(['title' => 'Panel'])
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Yönetim Paneli' }} | SAY Kurumsal</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-slate-100 text-slate-800">
<div class="min-h-screen flex">
    <aside class="w-64 shrink-0 bg-slate-900 text-slate-200 hidden md:flex md:flex-col">
        <div class="px-5 py-5 border-b border-slate-800">
            <a href="{{ route('admin.dashboard') }}" class="text-lg font-bold text-white">SAY<span class="text-orange-400">KURUMSAL</span></a>
            <div class="text-xs text-slate-400 mt-1">Yönetim Paneli</div>
        </div>
        <nav class="flex-1 overflow-y-auto py-4 text-sm">
            @php
                $nav = [
                    ['route' => 'admin.dashboard', 'label' => 'Panel', 'match' => 'admin.dashboard'],
                    ['route' => 'admin.settings.edit', 'label' => 'Site Ayarları', 'match' => 'admin.settings.*'],
                    ['route' => 'admin.hero-slides.index', 'label' => 'Anasayfa Slider', 'match' => 'admin.hero-slides.*'],
                    ['route' => 'admin.home-content.edit', 'label' => 'Anasayfa İçerikleri', 'match' => 'admin.home-content.*,admin.home-features.*,admin.process-steps.*'],
                    ['route' => 'admin.services.index', 'label' => 'Hizmetler', 'match' => 'admin.services.*,admin.service-items.*'],
                    ['route' => 'admin.sectors.index', 'label' => 'Sektörler', 'match' => 'admin.sectors.*'],
                    ['route' => 'admin.projects.index', 'label' => 'Projeler', 'match' => 'admin.projects.*'],
                    ['route' => 'admin.certificates.index', 'label' => 'Belgeler', 'match' => 'admin.certificates.*'],
                    ['route' => 'admin.stats.index', 'label' => 'Rakamlar', 'match' => 'admin.stats.*'],
                    ['route' => 'admin.reference-logos.index', 'label' => 'Referans Logoları', 'match' => 'admin.reference-logos.*'],
                    ['route' => 'admin.faqs.index', 'label' => 'SSS', 'match' => 'admin.faqs.*'],
                    ['route' => 'admin.blog-categories.index', 'label' => 'Blog Kategorileri', 'match' => 'admin.blog-categories.*'],
                    ['route' => 'admin.blog-posts.index', 'label' => 'Blog Yazıları', 'match' => 'admin.blog-posts.*'],
                    ['route' => 'admin.job-postings.index', 'label' => 'Açık Pozisyonlar', 'match' => 'admin.job-postings.*'],
                    ['route' => 'admin.job-applications.index', 'label' => 'Kariyer Başvuruları', 'match' => 'admin.job-applications.*'],
                    ['route' => 'admin.pages.index', 'label' => 'Sayfalar', 'match' => 'admin.pages.*,admin.page-sections.*'],
                    ['route' => 'admin.quote-requests.index', 'label' => 'Teklif Talepleri', 'match' => 'admin.quote-requests.*'],
                    ['route' => 'admin.contact-messages.index', 'label' => 'İletişim Mesajları', 'match' => 'admin.contact-messages.*'],
                    ['route' => 'admin.users.index', 'label' => 'Kullanıcılar', 'match' => 'admin.users.*'],
                    ['route' => 'admin.system.index', 'label' => 'Sistem / Veritabanı', 'match' => 'admin.system.*'],
                ];
            @endphp
            @foreach ($nav as $item)
                @php $active = false; foreach (explode(',', $item['match']) as $p) { if (request()->routeIs(trim($p))) { $active = true; break; } } @endphp
                <a href="{{ route($item['route']) }}"
                   class="block px-5 py-2.5 {{ $active ? 'bg-slate-800 text-white border-l-4 border-orange-400' : 'text-slate-300 hover:bg-slate-800/60 border-l-4 border-transparent' }}">
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>
        <div class="px-5 py-4 border-t border-slate-800 text-xs text-slate-400">
            <a href="{{ url('/') }}" target="_blank" class="hover:text-white">↗ Siteyi Görüntüle</a>
        </div>
    </aside>

    <div class="flex-1 flex flex-col min-w-0">
        <header class="bg-white border-b border-slate-200 px-4 md:px-8 py-3 flex items-center justify-between">
            <h1 class="text-lg font-semibold text-slate-800">{{ $title ?? 'Panel' }}</h1>
            <div class="flex items-center gap-4 text-sm">
                <span class="text-slate-500">{{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-slate-500 hover:text-orange-600">Çıkış Yap</button>
                </form>
            </div>
        </header>

        <main class="flex-1 p-4 md:p-8">
            @if (session('status'))
                <div class="mb-5 rounded-lg bg-emerald-50 text-emerald-700 border border-emerald-200 px-4 py-3 text-sm">
                    {{ session('status') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="mb-5 rounded-lg bg-red-50 text-red-700 border border-red-200 px-4 py-3 text-sm">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{ $slot }}
        </main>
    </div>
</div>
</body>
</html>
