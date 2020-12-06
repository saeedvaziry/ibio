<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param $request
     * @return array
     */
    public function toArray($request)
    {
        $data = parent::toArray($request);
        if ($this->password == 'not_set') {
            $data['password_not_set'] = true;
        }
        $data['avatar'] = $this->avatar_url;

        return $data;
    }
}
