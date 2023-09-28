<?php

namespace App\Http\Resources\Book;

use App\Http\Resources\Author\AuthorResource;
use App\Http\Resources\BookBind\BookBindResource;
use App\Http\Resources\BookReview\BookReviewCollection;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Format\FormatResource;
use App\Http\Resources\Gallery\GalleryResource;
use App\Http\Resources\Genre\GenreResource;
use App\Http\Resources\Language\LanguageResource;
use App\Http\Resources\Publisher\PublisherResource;
use App\Http\Resources\Script\ScriptResource;
use App\Models\Author;
use App\Models\BookBind;
use App\Models\Category;
use App\Models\Format;
use App\Models\Genre;
use App\Models\Language;
use App\Models\Publisher;
use App\Models\Script;
use App\Models\Student;
use Illuminate\Http\Resources\Json\JsonResource;
use function Symfony\Component\Translation\t;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'photo' => str_contains($this->cover(), 'http://') || str_contains($this->cover(), 'https://') ? $this->cover() : url($this->cover()),
            'pictures' => GalleryResource::collection($this->photos),

            'samples' => $this->samples,
            'bSamples' => $this->borrowedSamples,
            'rSamples' => $this->reservedSamples,
            'fSamples' => $this->failed()->count(),

            'ableToBorrow' => $this->ableToBorrow(), // this returns bool which determines if book can be borrowed or reserved
            'ableToReserve' => auth()->check() && Student::findOrFail(auth()->user()->id)->ableToGet($this->id, true), // this returns bool which determines if book can be  reserved to auth user

            'authors' => AuthorResource::collection($this->authors),
            'categories' => CategoryResource::collection($this->categories),
            'genres' => GenreResource::collection($this->genres),

            'publisher' => new PublisherResource($this->publisher),
            'script' => new ScriptResource($this->script),
            'language' => new LanguageResource($this->lang),
            'bookbind' => new BookBindResource($this->bookbind),
            'format' => new FormatResource($this->format),

            'description' => $this->description,
            'rating' => $this->reviews->count() > 0 ? round($this->reviews->sum('star') / $this->reviews->count(), 2) : 'Nema komentara',
//            'comments' => $this->reviews->count() > 0 ? BookReviewCollection::collection($this->reviews) : 'Nema komentara',

            'pages' => $this->pageNum,
            'pDate' => $this->publishDate,
            'isbn' => $this->isbn,
        ];
    }
}
