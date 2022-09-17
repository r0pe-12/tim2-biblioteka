<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Book\Evidencija\BookReservationCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class UserAllReservationsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'active' => BookReservationCollection::collection($this->activeRes()->get()),
            'archive' => BookReservationCollection::collection($this->archiveRes()->get())
        ];
    }
}
