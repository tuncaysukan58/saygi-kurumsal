<x-admin-layout title="Yeni Hizmet">
    <form method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data" class="bg-white rounded-xl border border-slate-200 p-6 max-w-3xl space-y-5">
        @csrf
        @include('admin.services._form')
        <x-primary-button>Oluştur</x-primary-button>
        <a href="{{ route('admin.services.index') }}" class="text-sm text-slate-500 ml-3">Vazgeç</a>
    </form>
</x-admin-layout>
