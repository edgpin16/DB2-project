<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class StoreSavedEmployeerPharmaceutist extends FormRequest
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
        $CI = $this->route('employeer')?->CI;
        $registry_number = $this->route('employeer')?->pharmaceutistCertificate()?->first()?->registry_number;

        return [
            //
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'CI' => ['required', 'numeric', Rule::unique('employeers', 'CI')->ignore($CI, 'CI'), 'min:1'],
            'date_birth' => ['required', 'date_format:Y-m-d'],
            'salary' => ['required', 'numeric', 'min:0'],
            'subsidiary' => ['required', 'numeric',
                Rule::exists('subsidiaries', 'id')->where(function($query){
                    $query->where('pharmacy_id', session('pharmacy')->id);
                }),
            ],
            'type_category' => ['required', 'string', Rule::in([
                'pharmaceutist'
            ])],
            'sanitary_permise_number' => ['required', 'numeric', 'min:1'],
            'schooling_number' => ['required', 'numeric', 'min:1'],
            'registry_number' => ['required', 'numeric', 
                Rule::unique('certificates', 'registry_number')->ignore($registry_number, 'registry_number'),
                'min:1'
            ],
            'university' => ['required', 'string', 'max:255'],
            'date_registration' => ['required', 'date_format:Y-m-d'],
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
            'date_registration.required' => 'La fecha de registro es requerida',
            'date_registration.date_format' => 'La fecha de registro no tiene un formato DD-MM-YYYY',

            'university.required' => 'Se requiere una universidad',
            'university.max' => 'La universidad excede los 255 caracteres, elige uno mas corto',

            'registry_number.min' => 'El n??mero de registro debe ser positivo y no nulo',
            'registry_number.numeric' => 'El n??mero de registro debe ser n??merico',
            'registry_number.unique' => 'El n??mero de registro ya esta registrado en la BD',
            'registry_number.required' => 'Se requiere un n??mero de registro',

            'schooling_number.required' => 'Se requiere un n??mero de colegiatura',
            'schooling_number.numeric' => 'El n??mero de colegiatura debe ser n??merico',
            'schooling_number.min' => 'El n??mero de colegiatura debe ser positivo y no nulo',

            'sanitary_permise_number.required' => 'Se requiere un n??mero de permiso sanitario',
            'sanitary_permise_number.numeric' => 'El n??mero de permiso sanitario debe ser n??merico',
            'sanitary_permise_number.min' => 'El n??mero de permiso sanitario debe ser positivo y no nulo',

            'name.required' => 'Se requiere un nombre',
            'name.max' => 'El nombre excede los 255 caracteres, elige uno mas corto',

            'surname.required' => 'Se requiere un apellido',
            'surname.max' => 'El apellido excede los 255 caracteres, elige uno mas corto',

            'CI.required' => 'La c??dula de identidad es requerida',
            'CI.numeric' => 'La c??dula de identidad debe ser completamente n??merica',
            'CI.unique' => 'La c??dula de identidad ya esta registrada en la BD',
            'CI.min' => 'La c??dula debe ser positiva',

            'date_birth.required' => 'La fecha de nacimiento es requerida',
            'date_birth.date_format' => 'La fecha de nacimiento no tiene un formato DD-MM-YYYY',

            'subsidiary.required' => 'La sucursal es obligatoria', 
            'subsidiary.numeric' => 'La sucursal debe tener id n??merico', 
            'subsidiary.exists' => 'La sucursal no esta registrada en la BD',

            'salary.required' => 'El salario es requerido',
            'salary.numeric' => 'El salario debe ser numerico',
            'salary.min' => 'El salario debe ser positivo',

            'type_category.required' => 'El tipo de categor??a es requerida',
            'type_category.string' => 'El tipo de categor??a debe ser un string',
            'type_category.in' => 'El tipo de categor??a no pertenece a la registrada en la BD',
        ];
    }
}
