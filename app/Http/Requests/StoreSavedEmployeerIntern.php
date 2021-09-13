<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class StoreSavedEmployeerIntern extends FormRequest
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
                'intern'
            ])],
            'university' => ['required', 'string', 'max:255'],
            'specialty' => ['required', 'string', 'max:255'],
            'start_internship' => ['required', 'date_format:Y-m-d'],
            'end_internship' => ['required', 'date_format:Y-m-d', 'after:start_internship'],
            'continue_working' => ['required', 'numeric', 'min:0', 'max:1'],
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

            'continue_working.max' => 'Valores incorrectos',
            'continue_working.min' => 'Valores incorrectos',
            'continue_working.numeric' => 'Los valores deben de ser numericos',
            'continue_working.required' => 'Continuara laborando es requerido',

            'end_internship.after' => 'La fecha de culminación de pasantía debe ser mayor a la fecha de inicio',
            'end_internship.required' => 'La fecha de culminación de pasantía es requerida',
            'end_internship.date_format' => 'La fecha de culminación de pasantía no tiene un formato DD-MM-YYYY',

            'start_internship.required' => 'La fecha de inicio de pasantía es requerida',
            'start_internship.date_format' => 'La fecha de inicio de pasantía no tiene un formato DD-MM-YYYY',

            'specialty.required' => 'Se requiere una especialidad',
            'specialty.max' => 'La especialidad excede los 255 caracteres, elige uno mas corto',

            'university.required' => 'Se requiere una universidad',
            'university.max' => 'La universidad excede los 255 caracteres, elige uno mas corto',

            'name.required' => 'Se requiere un nombre',
            'name.max' => 'El nombre excede los 255 caracteres, elige uno mas corto',

            'surname.required' => 'Se requiere un apellido',
            'surname.max' => 'El apellido excede los 255 caracteres, elige uno mas corto',

            'CI.required' => 'La cédula de identidad es requerida',
            'CI.numeric' => 'La cédula de identidad debe ser completamente númerica',
            'CI.unique' => 'La cédula de identidad ya esta registrada en la BD',
            'CI.min' => 'La cédula debe ser positiva',

            'date_birth.required' => 'La fecha de nacimiento es requerida',
            'date_birth.date_format' => 'La fecha de nacimiento no tiene un formato DD-MM-YYYY',

            'subsidiary.required' => 'La sucursal es obligatoria', 
            'subsidiary.numeric' => 'La sucursal debe tener id númerico', 
            'subsidiary.exists' => 'La sucursal no esta registrada en la BD',

            'salary.required' => 'El salario es requerido',
            'salary.numeric' => 'El salario debe ser numerico',
            'salary.min' => 'El salario debe ser positivo',

            'type_category.required' => 'El tipo de categoría es requerida',
            'type_category.string' => 'El tipo de categoría debe ser un string',
            'type_category.in' => 'El tipo de categoría no pertenece a la registrada en la BD',
        ];
    }
}
