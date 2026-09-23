<x-admin-layout title="Yeni Belge">
    <form method="POST" action="{{ route('admin.certificates.store') }}" enctype="multipart/form-data" class="bg-white rounded-xl border border-slate-200 p-6 max-w-2xl space-y-5">
        @csrf
        @include('admin.certificates._form')
        <x-primary-button>Oluştur</x-primary-button>
        <a href="{{ route('admin.certificates.index') }}" class="text-sm text-slate-500 ml-3">Vazgeç</a>
    </form>
</x-admin-layout>
