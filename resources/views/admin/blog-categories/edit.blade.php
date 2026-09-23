<x-admin-layout title="Kategoriyi Düzenle">
    <form method="POST" action="{{ route('admin.blog-categories.update', $category) }}" class="bg-white rounded-xl border border-slate-200 p-6 max-w-lg space-y-5">
        @csrf
        @method('PUT')
        <x-input-label value="Ad" />
        <x-text-input name="name" class="block mt-1 w-full" :value="old('name', $category->name)" required />
        <x-primary-button>Kaydet</x-primary-button>
        <a href="{{ route('admin.blog-categories.index') }}" class="text-sm text-slate-500 ml-3">Listeye Dön</a>
    </form>
</x-admin-layout>
