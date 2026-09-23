<x-admin-layout title="Sektörü Düzenle">
    <form method="POST" action="{{ route('admin.sectors.update', $sector) }}" enctype="multipart/form-data" class="bg-white rounded-xl border border-slate-200 p-6 max-w-2xl space-y-5">
        @csrf
        @method('PUT')
        @include('admin.sectors._form')
        <x-primary-button>Kaydet</x-primary-button>
        <a href="{{ route('admin.sectors.index') }}" class="text-sm text-slate-500 ml-3">Listeye Dön</a>
    </form>
</x-admin-layout>
