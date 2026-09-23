<x-admin-layout title="Soruyu Düzenle">
    <form method="POST" action="{{ route('admin.faqs.update', $faq) }}" class="bg-white rounded-xl border border-slate-200 p-6 max-w-2xl space-y-5">
        @csrf
        @method('PUT')
        @include('admin.faqs._form')
        <x-primary-button>Kaydet</x-primary-button>
        <a href="{{ route('admin.faqs.index') }}" class="text-sm text-slate-500 ml-3">Listeye Dön</a>
    </form>
</x-admin-layout>
