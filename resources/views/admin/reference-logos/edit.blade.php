<x-admin-layout title="Referans Logosunu Düzenle">
    <form method="POST" action="{{ route('admin.reference-logos.update', $logo) }}" enctype="multipart/form-data" class="bg-white rounded-xl border border-slate-200 p-6 max-w-2xl space-y-5">
        @csrf
        @method('PUT')
        @include('admin.reference-logos._form')
        <x-primary-button>Kaydet</x-primary-button>
        <a href="{{ route('admin.reference-logos.index') }}" class="text-sm text-slate-500 ml-3">Listeye Dön</a>
    </form>
</x-admin-layout>
