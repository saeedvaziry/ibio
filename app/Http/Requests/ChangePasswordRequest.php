<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    /**
     * @var string
     */
    protected $errorBag = 'changePassword';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'password' => [
                'required',
                'min:8',
                'confirmed'
            ]
        ];
        if ($this->user()->password != 'not_set') {
            $rules['current_password'] = 'required';
        }

        return $rules;
    }
}
