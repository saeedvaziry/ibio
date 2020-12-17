<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'payment_info' => $this->payment_info,
            'sender' => $this->sender,
            'details' => $this->details,
            'amount' => latin_number_to_persian(custom_money_format($this->amount)),
            'stat' => new StatResource($this->stats()->first()),
            'created_at' => jdate($this->created_at)->format('%d %B %Y') . __(' ساعت ') . jdate($this->created_at)->format('H:i:s')
        ];
    }
}
