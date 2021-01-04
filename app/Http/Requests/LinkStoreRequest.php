<?php

namespace App\Http\Requests;

class LinkStoreRequest extends LinkRequest
{
    /**
     * @var string
     */
    protected $errorBag = 'create';
}
