<x-admin-layout title="Projeyi Düzenle">
    <form method="POST" action="{{ route('admin.projects.update', $project) }}" enctype="multipart/form-data" class="bg-white rounded-xl border border-slate-200 p-6 max-w-3xl space-y-5">
        @csrf
        @method('PUT')
        @include('admin.projects._form')
        <x-primary-button>Kaydet</x-primary-button>
        <a href="{{ route('admin.projects.index') }}" class="text-sm text-slate-500 ml-3">Listeye Dön</a>
    </form>
</x-admin-layout>
