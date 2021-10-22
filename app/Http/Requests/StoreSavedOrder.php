<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class StoreSavedOrder extends FormRequest
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
        return [
            //
            'subsidiary' => ['required', 'numeric',
                Rule::exists('subsidiaries', 'id')->where(function($query){
                    $query->where('pharmacy_id', session('pharmacy')->id);
                }),
            ],
            'laboratory' => ['required', 'numeric', Rule::exists('laboratories', 'id')],
            'payment_type' => ['required', 'string', Rule::in(['decontado', 'credito'])],
            'payment_date' => ['required', 'date_format:Y-m-d', 'after_or_equal:today'],
            'analist' => ['required', 'string',
                // Rule::exists('employeers', 'CI'), //->where(function($query){ $query->where('subsidiary_id', 'subsidiary');}
            ],
            'medicines' => ['required', 'array', 'min:1'],
            'quantitys' => ['required', 'array', 'min:1'],
            'medicines.*' => ['required', 'numeric', 
                Rule::exists('medicines', 'serial_number')
            ],
            'quantitys.*' => ['required', 'numeric', 'min:1']
        ];
    }

    public function messages()
    {
        return [

            'subsidiary.required' => 'Se requiere una sucursal',
            'subsidiary.numeric' => 'Debe ser númerico el identificador de la sucursal',
            'subsidiary.exists' => 'El id debe de existir en la BD',

            'laboratory.required' => 'Se requiere un laboratorio',
            'laboratory.numeric' => 'Debe ser númerico el identificador del laboratorio',
            'laboratory.exists' => 'El id debe de existir en la BD',

            'payment_type.required' => 'El tipo de pago es requerido, verifica que es el correcto',
            'payment_type.string' => 'El tipo de pago debe de ser un string',
            'payment_type.in' => 'Tipo de pago no perteneciente a la bd',

            'payment_date.after_or_equal' => 'La fecha de pago debe ser mayor o igual a este día',
            'payment_date.required' => 'La fecha de pago es requerida',
            'payment_date.date_format' => 'La fecha de pago no tiene un formato DD-MM-YYYY',

            'analist.required' => 'El analista es requerido',
            'analist.numeric' => 'La CI del analista debe de ser numérico',
            'analist.exists' => 'La CI del analista debe de existir en la BD',

            'medicines.required' => 'Las medicinas son requeridas',
            'medicines.min' => 'Debe ser como mínimo, una medicina a comprar',
            'medicines.array' => 'Las medicinas deben de ser un array',

            'quantitys.required' => 'La cantidad es requerida',
            'quantitys.min' => 'Debes ingresar valores mayores o iguales a 1',
            'quantitys.array' => 'La cantidad debe de ser un array',

            'medicines.*.required' => 'Es requerida una medicina',
            'medicines.*.numeric' => 'Debe ser númerico el identificador de la medicina',
            'medicines.*.exists' => 'El identificador de la medicina debe de existir en la BD',

            'quantitys.*.required' => 'Es requerida una cantidad, mayor a igual a 1',
            'quantitys.*.numeric' => 'Debe ser númerico la cantidad de la medicina',
            'quantitys.*.min' => 'Debes ingresar valores mayores o iguales a 1',

        ];
    }

}
