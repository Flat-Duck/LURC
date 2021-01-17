<?php

namespace App\Http\Requests;

use App\Models\Entry;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEntryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('entry_create');
    }

    public function rules()
    {
        return [
            'rx' => [
                'string',
                'nullable',
            ],
        ];
    }
}