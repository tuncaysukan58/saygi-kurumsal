<x-admin-layout title="Yeni Kullanıcı">
    <form method="POST" action="{{ route('admin.users.store') }}" class="bg-white rounded-xl border border-slate-200 p-6 max-w-lg space-y-5">
        @csrf
        <div>
            <x-input-label value="Ad Soyad" />
            <x-text-input name="name" class="block mt-1 w-full" required autofocus />
        </div>
        <div>
            <x-input-label value="E-posta" />
            <x-text-input type="email" name="email" class="block mt-1 w-full" required />
        </div>
        <div>
            <x-input-label value="Şifre" />
            <x-text-input type="password" name="password" class="block mt-1 w-full" required />
        </div>
        <div>
            <x-input-label value="Şifre (Tekrar)" />
            <x-text-input type="password" name="password_confirmation" class="block mt-1 w-full" required />
        </div>
        <x-primary-button>Oluştur</x-primary-button>
        <a href="{{ route('admin.users.index') }}" class="text-sm text-slate-500 ml-3">Vazgeç</a>
    </form>
</x-admin-layout>
