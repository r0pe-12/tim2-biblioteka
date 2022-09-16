<?php

namespace App\Http\Resources\BookReview;

use App\Http\Resources\UserReviewResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BookReviewCollection extends JsonResource
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
            'student' => new UserReviewResource($this->student),
            'body' => $this->body,
            'star' => $this->star
        ];
    }
}
