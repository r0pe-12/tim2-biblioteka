<?php

namespace App\Http\Resources\Category;

use App\Http\Resources\Book\BookNoFilterCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoriesWithBooksCollection extends JsonResource
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
            'category' => $this->name,
            'books' => BookNoFilterCollection::collection($this->books->take(3))
        ];
    }
}
