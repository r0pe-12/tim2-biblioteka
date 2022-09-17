<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Book\Evidencija\BookBorrowCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class UserAllBorrowsResource extends JsonResource
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
            'izdate' => BookBorrowCollection::collection($this->active()),
            'vracene' => BookBorrowCollection::collection($this->returned()),
            'otpisane' => BookBorrowCollection::collection($this->otpisane()),
            'prekoracene' => BookBorrowCollection::collection($this->prekoracene())
        ];
    }
}
