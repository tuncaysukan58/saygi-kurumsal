<x-admin-layout title="Yeni Soru">
    <form method="POST" action="{{ route('admin.faqs.store') }}" class="bg-white rounded-xl border border-slate-200 p-6 max-w-2xl space-y-5">
        @csrf
        @include('admin.faqs._form')
        <x-primary-button>Oluştur</x-primary-button>
        <a href="{{ route('admin.faqs.index') }}" class="text-sm text-slate-500 ml-3">Vazgeç</a>
    </form>
</x-admin-layout>
