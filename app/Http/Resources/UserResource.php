<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'role' => $this->role->name,
            'jmbg' => $this->jmbg,
            'photoPath' => str_contains($this->photoPath, 'http://') || str_contains($this->photoPath, 'https://') ? $this->photoPath : url($this->photoPath),
            'username' => $this->username,
            'name' => $this->name,
            'surname' => $this->surname,
            'email' => $this->email,
        ];
    }
}
