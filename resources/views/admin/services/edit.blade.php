<x-admin-layout title="Hizmeti Düzenle">
    <form method="POST" action="{{ route('admin.services.update', $service) }}" enctype="multipart/form-data" class="bg-white rounded-xl border border-slate-200 p-6 max-w-3xl space-y-5 mb-8">
        @csrf
        @method('PUT')
        @include('admin.services._form')
        <x-primary-button>Kaydet</x-primary-button>
        <a href="{{ route('admin.services.index') }}" class="text-sm text-slate-500 ml-3">Listeye Dön</a>
    </form>

    <div class="bg-white rounded-xl border border-slate-200 p-6 max-w-3xl">
        <h2 class="font-semibold text-slate-700 mb-4">Alt Hizmetler ({{ $service->title }})</h2>
        <ul class="space-y-2 mb-4">
            @foreach ($service->items as $item)
                <li class="border border-slate-200 rounded-lg p-3">
                    <form method="POST" action="{{ route('admin.service-items.update', $item) }}" class="space-y-2">
                        @csrf @method('PUT')
                        <div class="flex items-center gap-2">
                            <input name="order" type="number" value="{{ $item->order }}" class="w-16 rounded-md border-slate-300 text-sm">
                            <input name="title" value="{{ $item->title }}" class="flex-1 rounded-md border-slate-300 text-sm">
                            <button class="text-xs text-blue-600">Kaydet</button>
                        </div>
                        <textarea name="description" rows="2" class="w-full rounded-md border-slate-300 text-sm">{{ $item->description }}</textarea>
                    </form>
                    <form method="POST" action="{{ route('admin.service-items.destroy', $item) }}" onsubmit="return confirm('Silinsin mi?')" class="mt-1">
                        @csrf @method('DELETE')
                        <button class="text-xs text-red-600">Sil</button>
                    </form>
                </li>
            @endforeach
        </ul>
        <form method="POST" action="{{ route('admin.service-items.store', $service) }}" class="space-y-2 border-t border-slate-100 pt-4">
            @csrf
            <div class="flex items-center gap-2">
                <input name="order" type="number" placeholder="Sıra" class="w-16 rounded-md border-slate-300 text-sm">
                <input name="title" placeholder="Alt hizmet başlığı" required class="flex-1 rounded-md border-slate-300 text-sm">
            </div>
            <textarea name="description" rows="2" placeholder="Açıklama" class="w-full rounded-md border-slate-300 text-sm"></textarea>
            <button class="text-xs bg-slate-800 text-white rounded px-3 py-2">Alt Hizmet Ekle</button>
        </form>
    </div>
</x-admin-layout>
