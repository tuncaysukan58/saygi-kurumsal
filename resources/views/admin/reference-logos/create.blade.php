<x-admin-layout title="Yeni Referans Logosu">
    <form method="POST" action="{{ route('admin.reference-logos.store') }}" enctype="multipart/form-data" class="bg-white rounded-xl border border-slate-200 p-6 max-w-2xl space-y-5">
        @csrf
        @include('admin.reference-logos._form')
        <x-primary-button>Oluştur</x-primary-button>
        <a href="{{ route('admin.reference-logos.index') }}" class="text-sm text-slate-500 ml-3">Vazgeç</a>
    </form>
</x-admin-layout>
