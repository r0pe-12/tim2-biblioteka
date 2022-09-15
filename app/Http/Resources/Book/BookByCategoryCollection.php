<?php

namespace App\Http\Resources\Book;

use App\Http\Resources\Author\AuthorInBookCollection;
use App\Http\Resources\Category\CategoryInBookCollection;
use App\Http\Resources\Genre\GenreInBookCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class BookByCategoryCollection extends JsonResource
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
            'id' => $this->id,
            'title' => $this->title,
            'photo' => str_contains($this->cover(), 'http://') || str_contains($this->cover(), 'https://') ? $this->cover() : url($this->cover()),

            'authors' => AuthorInBookCollection::collection($this->authors),
            'categories' => CategoryInBookCollection::collection($this->categories),
            'genres' => GenreInBookCollection::collection($this->genres),

            'description' => $this->description,
            'rating' => 'prosjek od svih reviewa : integer'
        ];
    }
}
