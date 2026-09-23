<x-admin-layout title="Kullanıcıyı Düzenle">
    <form method="POST" action="{{ route('admin.users.update', $editedUser) }}" class="bg-white rounded-xl border border-slate-200 p-6 max-w-lg space-y-5">
        @csrf
        @method('PUT')
        <div>
            <x-input-label value="Ad Soyad" />
            <x-text-input name="name" class="block mt-1 w-full" :value="old('name', $editedUser->name)" required />
        </div>
        <div>
            <x-input-label value="E-posta" />
            <x-text-input type="email" name="email" class="block mt-1 w-full" :value="old('email', $editedUser->email)" required />
        </div>
        <div>
            <x-input-label value="Yeni Şifre (opsiyonel)" />
            <x-text-input type="password" name="password" class="block mt-1 w-full" />
        </div>
        <div>
            <x-input-label value="Yeni Şifre (Tekrar)" />
            <x-text-input type="password" name="password_confirmation" class="block mt-1 w-full" />
        </div>
        <x-primary-button>Kaydet</x-primary-button>
        <a href="{{ route('admin.users.index') }}" class="text-sm text-slate-500 ml-3">Listeye Dön</a>
    </form>
</x-admin-layout>
