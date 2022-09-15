<?php

namespace App\Http\Resources\Book;

use App\Http\Resources\Author\AuthorInBookCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookNoFilterCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'cover' => str_contains($this->cover(), 'http://') || str_contains($this->cover(), 'https://') ? $this->cover() : url($this->cover()),
            'authors' => AuthorInBookCollection::collection($this->authors),
        ];
    }
}
