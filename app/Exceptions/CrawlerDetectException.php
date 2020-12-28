<?php

namespace App\Exceptions;

use Exception;

class CrawlerDetectException extends Exception
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function render()
    {
        return response()->json([
            'message' => "Don't do that bro!"
        ], 404);
    }
}
