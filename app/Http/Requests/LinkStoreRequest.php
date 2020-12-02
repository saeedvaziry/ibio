<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LinkStoreRequest extends FormRequest
{
    /**
     * @var string
     */
    protected $errorBag = 'create';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type' => 'required|in:text',
            'title' => 'required|max:255',
            'url' => 'required|url'
        ];
    }
}
