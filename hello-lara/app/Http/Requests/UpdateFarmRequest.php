<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Farm;

class UpdateFarmRequest extends FormRequest
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
        // weight	decimal(4,2)	
	    // animal	enum('avis', 'antis', 'antilopė')
    
        return [
            'weight' => ['required', 'numeric', 'between:0.01,99.99'],
            'animal' => ['required', 'in:'.implode(',', Farm::ANIMALS)],
        ];
    }

    // Papildoma validacija, nes svorio ribos priklauso nuo gyvulio rūšies:
    // antis 0 - 10 kg
    // avis 3 - 70 kg
    // antilopė 20 - 99.99 kg

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $weight = $this->input('weight');
            $animal = $this->input('animal');

            if ($animal === 'antis' && ($weight < 0.01 || $weight > 10)) {
                $validator->errors()->add('weight', 'Antis svoris turi būti tarp 0.01 ir 10 kg.');
            } elseif ($animal === 'avis' && ($weight < 3 || $weight > 70)) {
                $validator->errors()->add('weight', 'Avis svoris turi būti tarp 3 ir 70 kg.');
            } elseif ($animal === 'antilopė' && ($weight < 20 || $weight > 99.99)) {
                $validator->errors()->add('weight', 'Antilopės svoris turi būti tarp 20 ir 99.99 kg.');
            }
        });
    }

    public function messages(): array
    {
        return [
            'weight.required' => 'Svoris yra privalomas.',
            'weight.numeric' => 'Svoris turi būti skaičius.',
            'weight.between' => 'Svoris turi būti tarp :min ir :max kg.',
            'animal.required' => 'Gyvulio rūšis yra privaloma.',
            'animal.in' => 'Gyvulio rūšis turi būti viena iš: '.implode(', ', Farm::ANIMALS).'.',
        ];
    }
}
