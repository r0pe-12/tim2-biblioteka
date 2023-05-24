<?php

namespace App\Http\Resources\Book\Evidencija;

use App\Http\Resources\Book\BookResource;
use App\Http\Resources\User\UserReviewResource;
use App\Models\BookReturn;
use App\Models\Borrow;
use App\Models\WriteOff;
use Illuminate\Http\Resources\Json\JsonResource;

class BookBorrowCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'izdate' => BookBorrowResource::collection(Borrow::izdavanja()),
            'prekoracene' => BookBorrowResource::collection(WriteOff::prekoracene()),
            'otpisane' => BookBorrowResource::collection(WriteOff::otpisane()),
            'vracene' => BookBorrowResource::collection(BookReturn::returned())
        ];
    }
}
