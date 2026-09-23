<x-admin-layout title="Rakamı Düzenle">
    <form method="POST" action="{{ route('admin.stats.update', $stat) }}" class="bg-white rounded-xl border border-slate-200 p-6 max-w-2xl space-y-5">
        @csrf
        @method('PUT')
        @include('admin.stats._form')
        <x-primary-button>Kaydet</x-primary-button>
        <a href="{{ route('admin.stats.index') }}" class="text-sm text-slate-500 ml-3">Listeye Dön</a>
    </form>
</x-admin-layout>
