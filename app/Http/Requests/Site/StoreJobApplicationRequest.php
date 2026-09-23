<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobApplicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'job_posting_id' => ['nullable', 'exists:job_postings,id'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:255'],
            'department' => ['nullable', 'string', 'max:255'],
            'message' => ['nullable', 'string', 'max:2000'],
            'cv' => ['required', 'file', 'mimes:pdf,doc,docx', 'max:5120'],
        ];
    }

    public function messages(): array
    {
        return [
            'cv.required' => 'Lütfen CV dosyanızı yükleyin.',
            'cv.mimes' => 'CV yalnızca PDF, DOC veya DOCX formatında olabilir.',
            'cv.max' => 'CV dosyası en fazla 5 MB olabilir.',
        ];
    }
}
