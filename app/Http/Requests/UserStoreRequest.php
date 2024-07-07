<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required','string','min:5'],
            'email' => ['required','unique:users,email','string'],
            'password' => ['required','confirmed','min:8']
        ];
    }
    public function messages():array
    {
        return [
            'required' => 'Поле :attribute не должно быть пустым',
            'min' => ['array' => 'The :attribute field must have at least :min items.',
                'file' => 'The :attribute field must be at least :min kilobytes.',
                'numeric' => ':attribute должен быть минимум :min символов.',
                'string' => 'Поле :attribute должно :min символов.',],
            'confirmed' => ':attribute не совпадает'

        ];
    }
    public function attributes():array
    {
        return [
            'name' => 'Имя',
            'email' => 'Почта',
            'password' => 'Пароль'
        ];
    }
}

