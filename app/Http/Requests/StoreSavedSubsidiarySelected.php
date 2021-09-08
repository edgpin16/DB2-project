<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Subsidiary;

class StoreSavedSubsidiarySelected extends FormRequest
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
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        
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
            ], //Recuerda encriptar en la vista el id
            'type_category' => ['required', 'string', Rule::in([
                'minorIntern',
                'intern',
                'pharmaceutist',
                'Analyst',
                'auxiliaryPharmacy',
                'administrative'
            ])],
        ];
    }

    public function messages()
    {
        return [
            'subsidiary.required' => 'Se requiere una sucursal',
            'subsidiary.numeric' => 'Debe ser númerico el identificador de la sucursal',
            'subsidiary.exists' => 'El id debe de existir en la BD',
            'type_category.required' => 'La categoría es requerida, verifica que es la correcta',
            'type_Category.string' => 'La categoria debe de ser un string',
            'type_category.in' => 'Categoria no perteneciente a la bd',
        ];
    }

}
