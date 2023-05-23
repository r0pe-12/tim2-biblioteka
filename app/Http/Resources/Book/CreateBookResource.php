<?php

namespace App\Http\Resources\Book;

use App\Http\Resources\Author\AuthorResource;
use App\Http\Resources\BookBind\BookBindResource;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Format\FormatResource;
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
use Illuminate\Http\Resources\Json\JsonResource;

class CreateBookResource extends JsonResource
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
            'categories' => CategoryResource::collection(Category::all()),
            'genres' => GenreResource::collection(Genre::all()),
            'authors' => AuthorResource::collection(Author::all()),
            'publishers' => PublisherResource::collection(Publisher::all()),
            'scripts' => ScriptResource::collection(Script::all()),
            'languages' => LanguageResource::collection(Language::all()),
            'bookbinds' => BookBindResource::collection(BookBind::all()),
            'formats' => FormatResource::collection(Format::all()),
        ];
    }
}
