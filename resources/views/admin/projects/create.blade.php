<x-admin-layout title="Yeni Proje">
    <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data" class="bg-white rounded-xl border border-slate-200 p-6 max-w-3xl space-y-5">
        @csrf
        @include('admin.projects._form')
        <x-primary-button>Oluştur</x-primary-button>
        <a href="{{ route('admin.projects.index') }}" class="text-sm text-slate-500 ml-3">Vazgeç</a>
    </form>
</x-admin-layout>
