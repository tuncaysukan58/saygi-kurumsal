<x-admin-layout title="Site Ayarları">
    <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data" class="bg-white rounded-xl border border-slate-200 p-6 max-w-3xl space-y-5">
        @csrf
        @method('PUT')

        <div>
            <x-input-label value="Logo" />
            @if ($setting->logo_path)
                <img src="{{ asset('storage/'.$setting->logo_path) }}" class="h-14 my-2" alt="Logo">
            @endif
            <input type="file" name="logo" accept="image/*" class="block mt-1">
            <x-input-error :messages="$errors->get('logo')" class="mt-1" />
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <x-input-label value="Telefon (Sabit)" />
                <x-text-input name="phone_primary" class="block mt-1 w-full" :value="old('phone_primary', $setting->phone_primary)" />
            </div>
            <div>
                <x-input-label value="Telefon (Cep)" />
                <x-text-input name="phone_secondary" class="block mt-1 w-full" :value="old('phone_secondary', $setting->phone_secondary)" />
            </div>
            <div>
                <x-input-label value="WhatsApp Numarası" />
                <x-text-input name="whatsapp" class="block mt-1 w-full" :value="old('whatsapp', $setting->whatsapp)" placeholder="90532..." />
            </div>
            <div>
                <x-input-label value="E-posta" />
                <x-text-input type="email" name="email" class="block mt-1 w-full" :value="old('email', $setting->email)" />
            </div>
        </div>

        <div>
            <x-input-label value="Adres" />
            <x-text-input name="address" class="block mt-1 w-full" :value="old('address', $setting->address)" />
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <x-input-label value="Facebook URL" />
                <x-text-input name="facebook_url" class="block mt-1 w-full" :value="old('facebook_url', $setting->facebook_url)" />
            </div>
            <div>
                <x-input-label value="Instagram URL" />
                <x-text-input name="instagram_url" class="block mt-1 w-full" :value="old('instagram_url', $setting->instagram_url)" />
            </div>
            <div>
                <x-input-label value="LinkedIn URL" />
                <x-text-input name="linkedin_url" class="block mt-1 w-full" :value="old('linkedin_url', $setting->linkedin_url)" />
            </div>
            <div>
                <x-input-label value="YouTube URL" />
                <x-text-input name="youtube_url" class="block mt-1 w-full" :value="old('youtube_url', $setting->youtube_url)" />
            </div>
        </div>

        <div>
            <x-input-label value="Footer Metni" />
            <textarea name="footer_text" rows="2" class="block mt-1 w-full rounded-md border-slate-300">{{ old('footer_text', $setting->footer_text) }}</textarea>
        </div>

        <div>
            <x-input-label value="Varsayılan SEO Başlığı" />
            <x-text-input name="seo_title" class="block mt-1 w-full" :value="old('seo_title', $setting->seo_title)" />
        </div>
        <div>
            <x-input-label value="Varsayılan SEO Açıklaması" />
            <textarea name="seo_description" rows="2" class="block mt-1 w-full rounded-md border-slate-300">{{ old('seo_description', $setting->seo_description) }}</textarea>
        </div>

        <x-primary-button>Kaydet</x-primary-button>
    </form>
</x-admin-layout>
