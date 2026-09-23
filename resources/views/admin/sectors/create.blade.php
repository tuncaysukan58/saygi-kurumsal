<x-admin-layout title="Yeni Sektör">
    <form method="POST" action="{{ route('admin.sectors.store') }}" enctype="multipart/form-data" class="bg-white rounded-xl border border-slate-200 p-6 max-w-2xl space-y-5">
        @csrf
        @include('admin.sectors._form')
        <x-primary-button>Oluştur</x-primary-button>
        <a href="{{ route('admin.sectors.index') }}" class="text-sm text-slate-500 ml-3">Vazgeç</a>
    </form>
</x-admin-layout>
