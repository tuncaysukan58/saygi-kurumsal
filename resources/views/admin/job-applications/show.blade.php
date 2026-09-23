<x-admin-layout title="Başvuru Detayı">
    <div class="bg-white rounded-xl border border-slate-200 p-6 max-w-2xl space-y-4">
        <div class="grid grid-cols-2 gap-4 text-sm">
            <div><span class="text-slate-400">Ad Soyad</span><div class="font-medium">{{ $application->name }}</div></div>
            <div><span class="text-slate-400">Telefon</span><div class="font-medium">{{ $application->phone }}</div></div>
            <div><span class="text-slate-400">E-posta</span><div class="font-medium">{{ $application->email }}</div></div>
            <div><span class="text-slate-400">Pozisyon</span><div class="font-medium">{{ $application->jobPosting->title ?? $application->department ?? 'Genel Başvuru' }}</div></div>
            <div><span class="text-slate-400">Departman</span><div class="font-medium">{{ $application->department ?? '—' }}</div></div>
            <div><span class="text-slate-400">Tarih</span><div class="font-medium">{{ $application->created_at->format('d.m.Y H:i') }}</div></div>
        </div>

        <div>
            <span class="text-slate-400 text-sm">Ön Yazı / Mesaj</span>
            <p class="mt-1 text-sm whitespace-pre-line">{{ $application->message ?: '—' }}</p>
        </div>

        @if ($application->cv_path)
            <a href="{{ route('admin.job-applications.cv', $application) }}" class="inline-block text-sm text-blue-600">📎 CV'yi İndir</a>
        @endif

        <form method="POST" action="{{ route('admin.job-applications.update', $application) }}" class="flex items-center gap-3 pt-4 border-t border-slate-100">
            @csrf @method('PUT')
            <select name="status" class="rounded-md border-slate-300 text-sm">
                @foreach (['new' => 'Yeni', 'reviewed' => 'İncelendi', 'contacted' => 'Görüşüldü', 'rejected' => 'Reddedildi'] as $key => $label)
                    <option value="{{ $key }}" @selected($application->status === $key)>{{ $label }}</option>
                @endforeach
            </select>
            <x-primary-button>Durumu Güncelle</x-primary-button>
        </form>

        <form method="POST" action="{{ route('admin.job-applications.destroy', $application) }}" onsubmit="return confirm('Silinsin mi?')">
            @csrf @method('DELETE')
            <button class="text-sm text-red-600">Başvuruyu Sil</button>
        </form>

        <a href="{{ route('admin.job-applications.index') }}" class="block text-sm text-slate-500">← Listeye Dön</a>
    </div>
</x-admin-layout>
