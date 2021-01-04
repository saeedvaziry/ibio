<?php

namespace App\Http\Requests;

class LinkUpdateRequest extends LinkRequest
{
    /**
     * @var string
     */
    protected $errorBag = 'update';
}
