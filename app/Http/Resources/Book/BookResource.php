<?php

namespace App\Http\Resources\Book;

use App\Http\Resources\Author\AuthorInBookCollection;
use App\Http\Resources\BookReview\BookReviewCollection;
use App\Http\Resources\Category\CategoryInBookCollection;
use App\Http\Resources\Genre\GenreInBookCollection;
use App\Models\Student;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            'id' => $this->id,
            'title' => $this->title,
            'photo' => str_contains($this->cover(), 'http://') || str_contains($this->cover(), 'https://') ? $this->cover() : url($this->cover()),

            'samples' => $this->samples,
            'bSamples' => $this->borrowedSamples,
            'rSamples' => $this->reservedSamples,

            'ableToBorrow' => $this->ableToBorrow(), // this returns bool which determines if book can be borrowed or reserved
            'ableToReserve' => auth()->check() && Student::findOrFail(auth()->user()->id)->ableToGet($this->id, true), // this returns bool which determines if book can be  reserved to auth user

            'authors' => AuthorInBookCollection::collection($this->authors),
            'categories' => CategoryInBookCollection::collection($this->categories),
            'genres' => GenreInBookCollection::collection($this->genres),

            'description' => $this->description,
            'rating' => $this->reviews->count() > 0 ? round($this->reviews->sum('star') / $this->reviews->count(), 2) : 'Nema komentara',
            'comments' => $this->reviews->count() > 0 ? BookReviewCollection::collection($this->reviews) : 'Nema komentara',
        ];
    }
}
