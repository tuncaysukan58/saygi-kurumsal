<x-admin-layout title="Yeni Rakam">
    <form method="POST" action="{{ route('admin.stats.store') }}" class="bg-white rounded-xl border border-slate-200 p-6 max-w-2xl space-y-5">
        @csrf
        @include('admin.stats._form')
        <x-primary-button>Oluştur</x-primary-button>
        <a href="{{ route('admin.stats.index') }}" class="text-sm text-slate-500 ml-3">Vazgeç</a>
    </form>
</x-admin-layout>
