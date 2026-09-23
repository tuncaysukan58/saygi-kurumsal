@php $faq = $faq ?? null; @endphp

<div>
    <x-input-label value="Soru" />
    <x-text-input name="question" class="block mt-1 w-full" :value="old('question', $faq->question ?? '')" required />
</div>
<div>
    <x-input-label value="Cevap" />
    <textarea name="answer" rows="4" class="block mt-1 w-full rounded-md border-slate-300" required>{{ old('answer', $faq->answer ?? '') }}</textarea>
</div>
<div class="flex items-center gap-6">
    <div>
        <x-input-label value="Sıra" />
        <x-text-input type="number" name="order" class="block mt-1 w-24" :value="old('order', $faq->order ?? 0)" />
    </div>
    <label class="flex items-center gap-2 mt-6">
        <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $faq->is_active ?? true))>
        <span class="text-sm">Aktif (sitede görünür)</span>
    </label>
</div>
