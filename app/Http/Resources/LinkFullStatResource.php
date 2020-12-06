<?php

namespace App\Http\Resources;

use App\Traits\HasStats;
use Illuminate\Http\Resources\Json\JsonResource;

class LinkFullStatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param $request
     * @return array
     * @throws \Exception
     */
    public function toArray($request)
    {
        $stats = [];
        $dates = create_date_range(now()->subDays(7)->format('Y-m-d'), now()->format('Y-m-d'));
        foreach ($dates as $date) {
            array_push($stats, [
                'date' => $date,
                'clicks' => $this->clicks($date)
            ]);
        }

        return [
            'id' => $this->id,
            'stats' => $stats
        ];
    }
}
