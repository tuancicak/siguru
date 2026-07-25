<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreGuruRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
    return [
        'nip' => 'required|unique:gurus,nip',
        'nama' => 'required|string|max:255',
        'jabatan' => 'required|string|max:255',
        'no_hp' => 'nullable|string|max:20',
        'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8',
    ];
    }
}
