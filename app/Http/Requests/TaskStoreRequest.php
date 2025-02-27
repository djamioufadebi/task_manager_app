<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class TaskStoreRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'status' => 'in:en attente,en cours,terminé',
        ];

    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => true,
            'message' => "Erreur de validation",
            'errorsList' => $validator->errors(),
        ]));
    }


    public function messages() {
        return [
            'title.required' => 'Le titre est requis',
            'status.required' => 'Le statut est requis',
            'due_date.date' => 'Doit être une date valide',
            'status.in' => "Le statut doit être entre 'en attente', 'en cours', 'terminé' "
        ];
       
    }
}
