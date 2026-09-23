<x-admin-layout title="Hesabım">
    <div class="space-y-6 max-w-2xl">
        <div class="p-6 bg-white border border-slate-200 rounded-xl">
            @include('admin.profile.partials.update-profile-information-form')
        </div>

        <div class="p-6 bg-white border border-slate-200 rounded-xl">
            @include('admin.profile.partials.update-password-form')
        </div>

        <div class="p-6 bg-white border border-slate-200 rounded-xl">
            @include('admin.profile.partials.delete-user-form')
        </div>
    </div>
</x-admin-layout>
