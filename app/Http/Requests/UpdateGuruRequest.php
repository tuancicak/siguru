<?php

namespace App\Http\Requests;

use App\Models\Guru;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateGuruRequest extends FormRequest
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

        $guru = Guru::findOrFail($this->route('guru'));

        return [
            'nip' => [
                'required',
                Rule::unique('gurus', 'nip')->ignore($guru),
            ],

            'nama' => 'required|string|max:255',

            'jabatan' => 'required|string|max:255',

            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',

            'no_hp' => 'nullable|string|max:20',

            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($guru->user_id),
            ],

            'password' => 'nullable|min:8',
        ];
    }
}
