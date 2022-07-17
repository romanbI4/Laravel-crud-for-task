<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'executor' => 'required|string|max:255',
            'provider' => 'required|string|max:255',
            'estimates' => 'required|integer',
            'deadline' => 'required|date',
        ];
    }
}
