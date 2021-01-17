<?php

namespace App\Http\Requests;

use App\Models\Entry;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEntryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('entry_edit');
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