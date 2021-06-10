<?php

namespace Encodeurs\Cruder\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuilderGenerateRequest extends FormRequest
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
            "modelName" => [
                "required",
                "string",
                "max:255",
            ],
            "tableName" => [
                "nullable",
                "string",
                "max:255",
            ],
            "options.forceMigrate" => [
                "required",
                "boolean",
            ],
            "options.paginate" => [
                "nullable",
                "integer",
            ],
            "options.prefix" => [
                "nullable",
                "boolean",
            ],
            "options.softDelete" => [
                "required",
                "boolean",
            ],
            "options.swagger" => [
                "required",
                "boolean",
            ],
        ];
    }
}
