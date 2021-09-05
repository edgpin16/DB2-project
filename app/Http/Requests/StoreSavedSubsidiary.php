<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class StoreSavedSubsidiary extends FormRequest
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
        $this->merge([
            'slug' => Str::slug($this->name), //Colocamos de una vez el slug, dependiendo del nombre
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route('subsidiary')?->id; //Obtiene el id de la sucursal pasada por url, si no existe lo ignora, esto se usa cuando se actualiza una sucursal

        return [
            //Se describiran los campos y sus reglas
            'name' => ['required', 'string', 'max:255', Rule::unique('subsidiaries', 'name')->ignore($id) ],
            'slug' => [Rule::unique('subsidiaries', 'slug')->ignore($id)],
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
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
            'name.unique' => 'Nombre ya registrado en la bd, elige otro',
            'slug.unique' => 'Posiblemente se este repitiendo la url que apunta al proyecto, elige otro nombre',
            'city.required' => 'Se requiere una ciudad',
            'province.required' => 'Se requiere una provincia o estado',
        ];
    }
}
