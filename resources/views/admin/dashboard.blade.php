<x-admin-layout :title="'Panel'">
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
        <a href="{{ route('admin.quote-requests.index') }}" class="bg-white rounded-xl border border-slate-200 p-5 hover:shadow">
            <div class="text-3xl font-bold text-orange-500">{{ $newQuoteCount }}</div>
            <div class="text-slate-500 text-sm mt-1">Yeni Teklif Talebi</div>
        </a>
        <a href="{{ route('admin.contact-messages.index') }}" class="bg-white rounded-xl border border-slate-200 p-5 hover:shadow">
            <div class="text-3xl font-bold text-orange-500">{{ $newContactCount }}</div>
            <div class="text-slate-500 text-sm mt-1">Yeni İletişim Mesajı</div>
        </a>
        <a href="{{ route('admin.job-applications.index') }}" class="bg-white rounded-xl border border-slate-200 p-5 hover:shadow">
            <div class="text-3xl font-bold text-orange-500">{{ $newApplicationCount }}</div>
            <div class="text-slate-500 text-sm mt-1">Yeni Kariyer Başvurusu</div>
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="bg-white rounded-xl border border-slate-200 p-5">
            <h2 class="font-semibold mb-3">Son Teklif Talepleri</h2>
            <ul class="text-sm divide-y divide-slate-100">
                @forelse ($latestQuotes as $q)
                    <li class="py-2 flex justify-between"><span>{{ $q->name }}</span><span class="text-slate-400">{{ $q->created_at->diffForHumans() }}</span></li>
                @empty
                    <li class="py-2 text-slate-400">Kayıt yok.</li>
                @endforelse
            </ul>
        </div>
        <div class="bg-white rounded-xl border border-slate-200 p-5">
            <h2 class="font-semibold mb-3">Son İletişim Mesajları</h2>
            <ul class="text-sm divide-y divide-slate-100">
                @forelse ($latestContacts as $c)
                    <li class="py-2 flex justify-between"><span>{{ $c->name }}</span><span class="text-slate-400">{{ $c->created_at->diffForHumans() }}</span></li>
                @empty
                    <li class="py-2 text-slate-400">Kayıt yok.</li>
                @endforelse
            </ul>
        </div>
        <div class="bg-white rounded-xl border border-slate-200 p-5">
            <h2 class="font-semibold mb-3">Son Kariyer Başvuruları</h2>
            <ul class="text-sm divide-y divide-slate-100">
                @forelse ($latestApplications as $a)
                    <li class="py-2 flex justify-between"><span>{{ $a->name }}</span><span class="text-slate-400">{{ $a->created_at->diffForHumans() }}</span></li>
                @empty
                    <li class="py-2 text-slate-400">Kayıt yok.</li>
                @endforelse
            </ul>
        </div>
    </div>
</x-admin-layout>
