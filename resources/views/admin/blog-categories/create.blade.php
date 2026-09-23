<x-admin-layout title="Yeni Kategori">
    <form method="POST" action="{{ route('admin.blog-categories.store') }}" class="bg-white rounded-xl border border-slate-200 p-6 max-w-lg space-y-5">
        @csrf
        <x-input-label value="Ad" />
        <x-text-input name="name" class="block mt-1 w-full" required autofocus />
        <x-primary-button>Oluştur</x-primary-button>
        <a href="{{ route('admin.blog-categories.index') }}" class="text-sm text-slate-500 ml-3">Vazgeç</a>
    </form>
</x-admin-layout>
