<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class StoreSavedMedicine extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $serial_number = $this->route('medicine')?->serial_number;

        return [
            //
            'serial_number' => ['required', 'numeric', 'min:1',
                Rule::unique('medicines', 'serial_number')->ignore($serial_number, 'serial_number'), 
            ],
            'name_medicine' => ['required', 'string', 'max:255'],
            'presentation' => ['required', 'string', 'max:255'],
            'main_component' => ['required', 'string', 'max:255'],
            'therapeutic_action' => ['required', 'string', 'max:255'],
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

            'therapeutic_action.required' => 'Se requiere una acción terapeútica',
            'therapeutic_action.max' => 'La acción terapeútica excede los 255 caracteres, elige uno mas corto',

            'main_component.required' => 'Se requiere un componente principal',
            'main_component.max' => 'El componente principal excede los 255 caracteres, elige uno mas corto',

            'presentation.required' => 'Se requiere una presentación',
            'presentation.max' => 'La presentación excede los 255 caracteres, elige uno mas corto',

            'name_medicine.required' => 'Se requiere un nombre de medicina',
            'name_medicine.max' => 'El nombre de la medicina excede los 255 caracteres, elige uno mas corto',

            'serial_number.required' => 'El número de serial es requerido',
            'serial_number.numeric' => 'El número de serial debe ser completamente númerico',
            'serial_number.unique' => 'El número de serial ya esta registrado en la BD',
            'serial_number.min' => 'El número de serial debe ser positivo',
        ];
    }
}
