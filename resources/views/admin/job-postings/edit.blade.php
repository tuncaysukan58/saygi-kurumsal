<x-admin-layout title="İlanı Düzenle">
    <form method="POST" action="{{ route('admin.job-postings.update', $posting) }}" class="bg-white rounded-xl border border-slate-200 p-6 max-w-2xl space-y-5">
        @csrf
        @method('PUT')
        @include('admin.job-postings._form')
        <x-primary-button>Kaydet</x-primary-button>
        <a href="{{ route('admin.job-postings.index') }}" class="text-sm text-slate-500 ml-3">Listeye Dön</a>
    </form>
</x-admin-layout>
