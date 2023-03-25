<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $id
 * @property mixed $type
 * @property mixed $data
 * @property mixed $is_active
 * @property mixed $sort
 * @property mixed $thumbnail_url
 *
 * @method type()
 */
class LinkResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'data' => $this->data,
            'thumbnail' => $this->thumbnail_url,
            'is_data_valid' => $this->type()->isDataValid(),
            'is_active' => $this->is_active,
            'sort' => $this->sort,
        ];
    }
}
