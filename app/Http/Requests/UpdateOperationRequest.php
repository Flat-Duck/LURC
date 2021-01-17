<?php

namespace App\Http\Requests;

use App\Models\Operation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOperationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('operation_edit');
    }

    public function rules()
    {
        return [];
    }
}