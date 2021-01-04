<?php

namespace App\Http\Requests;

use App\Rules\AparatUrl;
use App\Rules\SoundcloudUrl;
use App\Rules\SpotifyUrl;
use App\Rules\YoutubeUrl;
use Illuminate\Foundation\Http\FormRequest;

class LinkRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'type' => 'required|in:text,youtube,spotify,soundcloud,aparat',
            'title' => 'required|max:255',
            'title_en' => 'max:255',
            'url' => [
                'required',
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
            case 'aparat':
                array_push($rules['url'], new AparatUrl());
                break;
        }

        return $rules;
    }
}
