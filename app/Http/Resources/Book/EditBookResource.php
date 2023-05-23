<?php

namespace App\Http\Resources\Book;

use App\Http\Resources\Author\AuthorInBookCollection;
use App\Http\Resources\BookBind\BookBindInBookCollection;
use App\Http\Resources\Category\CategoryInBookCollection;
use App\Http\Resources\Format\FormatInBookCollection;
use App\Http\Resources\Genre\GenreInBookCollection;
use App\Http\Resources\Language\LanguageInBookCollection;
use App\Http\Resources\Publisher\PublisherInBookCollection;
use App\Http\Resources\Script\ScriptInBookCollection;
use App\Models\Author;
use App\Models\BookBind;
use App\Models\Category;
use App\Models\Format;
use App\Models\Genre;
use App\Models\Language;
use App\Models\Publisher;
use App\Models\Script;
use Illuminate\Http\Resources\Json\JsonResource;

class EditBookResource extends JsonResource
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
            'book' => new BookResource($this),
            'categories' => CategoryInBookCollection::collection(Category::all()),
            'genres' => GenreInBookCollection::collection(Genre::all()),
            'authors' => AuthorInBookCollection::collection(Author::all()),
            'publishers' => PublisherInBookCollection::collection(Publisher::all()),
            'scripts' => ScriptInBookCollection::collection(Script::all()),
            'languages' => LanguageInBookCollection::collection(Language::all()),
            'bookbinds' => BookBindInBookCollection::collection(BookBind::all()),
            'formats' => FormatInBookCollection::collection(Format::all()),
        ];
    }
}
