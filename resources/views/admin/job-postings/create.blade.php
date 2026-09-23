<x-admin-layout title="Yeni İlan">
    <form method="POST" action="{{ route('admin.job-postings.store') }}" class="bg-white rounded-xl border border-slate-200 p-6 max-w-2xl space-y-5">
        @csrf
        @include('admin.job-postings._form')
        <x-primary-button>Oluştur</x-primary-button>
        <a href="{{ route('admin.job-postings.index') }}" class="text-sm text-slate-500 ml-3">Vazgeç</a>
    </form>
</x-admin-layout>
