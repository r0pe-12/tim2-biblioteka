<?php

namespace App\Http\Resources\Author;

use App\Http\Resources\Book\BookResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MainAuthorResource extends JsonResource
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
            'name' => $this->name,
            'surname' => $this->surname,
            'bio' => $this->biography,
            'photoPath' => $this->photoPath,
            'books' => BookResource::collection($this->books)
        ];
    }
}
