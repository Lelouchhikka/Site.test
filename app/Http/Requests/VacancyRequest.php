<?php

namespace App\Http\Requests;

use App\Models\Vacancy;
use Illuminate\Foundation\Http\FormRequest;

class VacancyRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title'=>[
                'required', 'string'
            ],
            'text_content'=>[
                'required', 'string'
            ]
        ];
    }
}
