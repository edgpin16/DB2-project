<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class StoreSavedEmployeer extends FormRequest
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
        $CI = $this->route('employeer')?->CI; //Obtiene el CI del empleado a editar

        return [
            //
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'CI' => ['required', 'numeric', Rule::unique('employeers', 'CI')->ignore($CI, 'CI')],
            'date_birth' => ['required', 'date_format:Y-m-d'],
            'salary' => ['required', 'numeric'],
            'subsidiary' => ['required', 'numeric',
                Rule::exists('subsidiaries', 'id')->where(function($query){
                    $query->where('pharmacy_id', session('pharmacy')->id);
                }),
            ],
            'type_category' => ['required', 'string', Rule::in([
                'Analyst',
                'auxiliaryPharmacy',
                'administrative'
            ])],
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
            'name.required' => 'Se requiere un nombre',
            'name.max' => 'El nombre excede los 255 caracteres, elige uno mas corto',
            'surname.required' => 'Se requiere un apellido',
            'surname.max' => 'El apellido excede los 255 caracteres, elige uno mas corto',
            'CI.required' => 'La cédula de identidad es requerida',
            'CI.numeric' => 'La cédula de identidad debe ser completamente númerica',
            'CI.unique' => 'La cédula de identidad ya esta registrada en la BD',
            'date_birth.required' => 'La fecha de nacimiento es requerida',
            'date_birth.date_format' => 'La fecha de nacimiento no tiene un formato DD-MM-YYYY',
            'subsidiary.required' => 'La sucursal es obligatoria', 
            'subsidiary.numeric' => 'La sucursal debe tener id númerico', 
            'subsidiary.exists' => 'La sucursal no esta registrada en la BD', 
            'salary.required' => 'El salario es requerido',
            'salary.numeric' => 'El salario debe ser numerico',
            'type_category.required' => 'El tipo de categoría es requerida',
            'type_category.string' => 'El tipo de categoría debe ser un string',
            'type_category.in' => 'El tipo de categoría no pertenece a la registrada en la BD',
        ];
    }

}
