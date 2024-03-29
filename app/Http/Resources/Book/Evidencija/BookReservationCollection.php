<?php

namespace App\Http\Resources\Book\Evidencija;

use App\Http\Resources\Book\BookNoFilterCollection;
use App\Http\Resources\User\UserReviewResource;
use App\Models\Policy;
use Illuminate\Http\Resources\Json\JsonResource;

class BookReservationCollection extends JsonResource
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
            'submitting_date' => $this->submttingDate,
            'closing_date' => \Carbon\Carbon::parse($this->submttingDate)->addDays(Policy::reservation()->value), //todo datum do kad rezervacija traje --- ovako stavljam jer nemam polje u bazu pa recunam odje ali se mora i u bazi upisati
            'status' => $this->status,
            'closing_reason' => $this->cReason,
            'action_date' => $this->datum
        ];
    }
}
