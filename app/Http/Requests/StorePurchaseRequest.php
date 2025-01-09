<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePurchaseRequest extends FormRequest
{
    /**
     * Détermine si l'utilisateur est autorisé à effectuer cette requête.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Assurez-vous de renvoyer 'true' pour autoriser la requête
    }

    /**
     * Obtenez les règles de validation qui s'appliquent à la requête.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'partner_id' => ['required', 'exists:partners,id'],
            'adresse' => ['required', 'string'],
            'type_remise' => ['required', 'string'],
            'valeur_remise' => ['required', 'numeric'],
            'date_achat' => ['required', 'date'],
            'magasin_entrepot' => ['required', 'string'],
            'montant_payer' => ['required', 'numeric'],
            'articles' => ['required', 'array', 'min:1'],
            'articles.*.article_id' => ['required', 'integer', 'exists:articles,id'],
            'articles.*.quantite' => ['required', 'integer', 'min:1'],
        ];
    }

    /**
     * Après la validation, on peut appliquer des validations supplémentaires.
     *
     * @param \Illuminate\Contracts\Validation\Validator $validator
     * @return void
     */
    public function withValidator($validator)
    {
        // Vérification d'unicité des article_id dans le tableau
        $validator->after(function ($validator) {
            $articleIds = collect($this->input('articles'))->pluck('article_id');
            if ($articleIds->count() !== $articleIds->unique()->count()) {
                $validator->errors()->add('articles', 'Les identifiants des articles doivent être uniques.');
            }
        });
    }
}
