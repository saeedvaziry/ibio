<?php

namespace App\Http\Requests;

use App\Rules\SoundcloudUrl;
use App\Rules\SpotifyUrl;
use App\Rules\YoutubeUrl;
use Illuminate\Foundation\Http\FormRequest;

class LinkUpdateRequest extends FormRequest
{
    /**
     * @var string
     */
    protected $errorBag = 'update';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'type' => 'required|in:text,youtube,spotify,soundcloud',
            'title' => 'required|max:255',
            'url' => [
                'required',
                'url',
                'max:1000'
            ]
        ];

        switch ($this->type) {
            case 'youtube':
                array_push($rules['url'], new YoutubeUrl());
                break;
            case 'spotify':
                array_push($rules['url'], new SpotifyUrl());
                break;
            case 'soundcloud':
                array_push($rules['url'], new SoundcloudUrl());
                break;
        }

        return $rules;
    }
}
