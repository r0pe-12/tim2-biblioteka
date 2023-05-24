<?php

namespace App\Http\Resources\Book\Evidencija;

use App\Models\Reservation;
use Illuminate\Http\Resources\Json\JsonResource;

class BookReservationCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if ($book = $this['book']) {
            return [
              'active' => BookBorrowResource::collection($book->activeRes()->get()),
              'archive' => BookBorrowResource::collection($book->archiveRes()->get())
            ];
        }

        return [
            'active' => BookBorrowResource::collection(Reservation::active()->get()),
            'archive' => BookBorrowResource::collection(Reservation::archive()->get())
        ];
    }
}
