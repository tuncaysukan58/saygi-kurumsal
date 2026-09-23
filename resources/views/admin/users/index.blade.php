<x-admin-layout title="Kullanıcılar">
    <div class="flex justify-between items-center mb-5">
        <p class="text-slate-500 text-sm">Yönetim paneline giriş yapabilen kullanıcılar.</p>
        <a href="{{ route('admin.users.create') }}" class="bg-slate-800 text-white text-sm px-4 py-2 rounded-lg">+ Yeni Kullanıcı</a>
    </div>
    <div class="bg-white rounded-xl border border-slate-200 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-500 text-left">
                <tr><th class="px-4 py-3">Ad Soyad</th><th class="px-4 py-3">E-posta</th><th class="px-4 py-3"></th></tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach ($users as $user)
                    <tr>
                        <td class="px-4 py-3 font-medium">{{ $user->name }}</td>
                        <td class="px-4 py-3">{{ $user->email }}</td>
                        <td class="px-4 py-3 text-right space-x-3">
                            <a href="{{ route('admin.users.edit', $user) }}" class="text-blue-600">Düzenle</a>
                            @if ($user->id !== auth()->id())
                                <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="inline" onsubmit="return confirm('Silinsin mi?')">
                                    @csrf @method('DELETE')
                                    <button class="text-red-600">Sil</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>
