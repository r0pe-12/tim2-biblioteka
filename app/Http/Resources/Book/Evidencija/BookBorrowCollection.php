<?php

namespace App\Http\Resources\Book\Evidencija;

use App\Http\Resources\Book\BookNoFilterCollection;
use App\Http\Resources\User\UserReviewResource;
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
            'knjiga' => new BookNoFilterCollection($this->book),
            'bibliotekar0' => new UserReviewResource($this->librarian),
            'bibliotekar1' => new UserReviewResource($this->librarian1),
            'borrow_date' => $this->borrow_date,
            'return_date' => $this->return_date,
            'status' => $this->status()->name,
            'action_date' => $this->datum
        ];
    }
}
