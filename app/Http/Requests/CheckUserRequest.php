<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Exceptions\HttpResponseException;

class CheckUserRequest extends FormRequest
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
            'name' =>
                Rule::unique('users')->ignore($this->user_id)
        ];
    }

    public function failedValidation(Validator $validator)
    {
        $response['data'] = [];
        $response['status'] = 'NG';
        $response['summary'] = 'Failed validation';
        $response['errors'] = $validator->errors()->toArray();

        throw new HttpResponseException(
          response()->json($response,422)
        );
    }
}
