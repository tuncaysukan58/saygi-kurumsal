<x-admin-layout title="Yeni Sayfa">
    <form method="POST" action="{{ route('admin.pages.store') }}" class="bg-white rounded-xl border border-slate-200 p-6 max-w-2xl space-y-5">
        @csrf
        <x-input-label value="Başlık" />
        <x-text-input name="title" class="block mt-1 w-full" required autofocus />
        <x-input-label value="Giriş Metni" />
        <textarea name="intro" rows="3" class="block mt-1 w-full rounded-md border-slate-300"></textarea>
        <x-primary-button>Oluştur</x-primary-button>
        <a href="{{ route('admin.pages.index') }}" class="text-sm text-slate-500 ml-3">Vazgeç</a>
    </form>
</x-admin-layout>
