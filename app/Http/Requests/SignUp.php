<?php
/**
 * Created by PhpStorm.
 * User: Alexandr Odarych
 */
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUp extends FormRequest
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
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:6',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    /**
     * @param \Illuminate\Contracts\Validation\Validator $validator
     * @throws \Exception
     */
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new \Exception($validator->getMessageBag());
    }
}
