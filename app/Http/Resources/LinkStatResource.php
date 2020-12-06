<?php

namespace App\Http\Resources;

use App\Traits\HasStats;
use Illuminate\Http\Resources\Json\JsonResource;

class LinkStatResource extends JsonResource
{
    use HasStats;

    /**
     * Transform the resource into an array.
     *
     * @param $request
     * @return array
     * @throws \Exception
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'title' => $this->title,
            'real_url' => $this->real_url,
            'clicks' => $this->stats()->count()
        ];
    }
}
