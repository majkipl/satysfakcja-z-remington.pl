<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreApplicationRequest extends FormRequest
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
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'firstname' => 'bail|required|string|min:3|max:128',
            'lastname' => 'bail|required|string|min:3|max:128',
            'email' => 'bail|required|string|max:255|email:rfc,dns|unique:applications,email',
            'phone' => [
                'bail',
                'required',
                'regex:/^\+48(\s)?([1-9]\d{8}|[1-9]\d{2}\s\d{3}\s\d{3}|[1-9]\d{1}\s\d{3}\s\d{2}\s\d{2}|[1-9]\d{1}\s\d{2}\s\d{3}\s\d{2}|[1-9]\d{1}\s\d{2}\s\d{2}\s\d{3}|[1-9]\d{1}\s\d{4}\s\d{2}|[1-9]\d{2}\s\d{2}\s\d{2}\s\d{2}|[1-9]\d{2}\s\d{3}\s\d{2}|[1-9]\d{2}\s\d{4})$/'
            ],
            'address' => 'bail|required|string|max:255',
            'city' => 'bail|required|string|min:2|max:64',
            'code' => 'bail|required|regex:/^[0-9]{2}\-[0-9]{3}$/',
            'voivodeship' => 'bail|required|numeric|between:1,15',
            'iban' => [
                'bail',
                'required',
                'regex:/^(PL(\s)?)?(\d{26})|(\d{2}(\s\d{4}){6})$/'
            ],
            'reason' => 'bail|required|string|min:3|max:1024',
            'legal_1' => 'bail|required',
            'legal_2' => 'bail|required',
            'legal_3' => 'bail|required',
            'legal_4' => 'bail',
            'img_receipt' => 'bail|required|file|mimes:jpeg,jpg,png|max:4096',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'firstname.required' => 'Pole jest wymagane.',
            'firstname.string' => 'Wprowadź wartość tekstową.',
            'firstname.min' => 'Pole wymaga minimum :min znaków.',
            'firstname.max' => 'Pole wymaga maksymalnie :max znaków.',
            'lastname.required' => 'Pole jest wymagane.',
            'lastname.string' => 'Wprowadź wartość tekstową.',
            'lastname.min' => 'Pole wymaga minimum :min znaków.',
            'lastname.max' => 'Pole wymaga maksymalnie :max znaków.',
            'email.required' => 'Pole jest wymagane.',
            'email.string' => 'Wprowadź wartość tekstową.',
            'email.max' => 'Pole wymaga maksymalnie :max znaków.',
            'email.email' => 'Błędny format wprowadzonych danych.',
            'email.unique' => 'Adres e-mail jest już zajęty.',
            'phone.required' => 'Pole jest wymagane.',
            'phone.regex' => 'Błędny format wprowadzonych danych.',
            'address.required' => 'Pole jest wymagane.',
            'address.string' => 'Wprowadź wartość tekstową.',
            'address.max' => 'Pole wymaga maksymalnie :max znaków.',
            'city.required' => 'Pole jest wymagane.',
            'city.string' => 'Wprowadź wartość tekstową.',
            'city.min' => 'Pole wymaga minimum :min znaków.',
            'city.max' => 'Pole wymaga maksymalnie :max znaków.',
            'code.required' => 'Pole jest wymagane.',
            'code.regex' => 'Błędny format wprowadzonych danych.',
            'voivodeship.required' => 'Pole jest wymagane.',
            'voivodeship.number' => 'Wybierz prawidłową wartość.',
            'voivodeship.between' => 'Wybierz prawidłową wartość.',
            'iban.required' => 'Pole jest wymagane.',
            'iban.regex' => 'Błędny format wprowadzonych danych.',
            'reason.required' => 'Pole jest wymagane.',
            'reason.string' => 'Wprowadź wartość tekstową.',
            'reason.min' => 'Pole wymaga minimum :min znaków.',
            'reason.max' => 'Pole wymaga maksymalnie :max znaków.',
            'legal_1.required' => 'Pole jest wymagane.',
            'legal_2.required' => 'Pole jest wymagane.',
            'legal_3.required' => 'Pole jest wymagane.',
            'img_receipt.required' => 'Pole jest wymagane.',
            'img_receipt.file' => 'Pole wymaga pliku.',
            'img_receipt.mimes' => 'Dopuszczalne typy plików jpeg,jpg,png.',
            'img_receipt.max' => 'Plik nie może być większy niż 4MB.',
        ];
    }
}
