<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class CrawlerDetectException extends Exception
{
    public function render(): JsonResponse
    {
        return response()->json([
            'message' => 'Not found',
        ], 404);
    }
}
