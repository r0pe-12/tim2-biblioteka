<?php

namespace App\Http\Requests\Book;

use Carbon\Carbon;
use http\Client\Request;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'title' => ['required', 'string'],
            'pageNum' => ['required', 'integer'],
            'script_id' => ['required', 'integer'],
            'language_id' => ['required', 'integer'],
            'bookbind_id' => ['required', 'integer'],
            'format_id' => ['required', 'integer'],
            'publisher_id' => ['required', 'integer'],
            'publishDate' => ['required'],
            'isbn' => ['required', 'regex:/^[0-9]{20}+$/', 'max:20', 'min:20'],
            'samples' => ['required', 'integer'],
            'description' => [''],

//          this should be assigned through has many relation pivot table
            'categories' => ['required'],
            'genres' => ['required'],
            'authors' => ['required'],

//            multimedia
            'pictures' => [''],
            'cover' => [''],

            'present' => ['']
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->replace([
            'title' => $this->nazivKnjiga,
            'pageNum' => $this->brStrana,
            'script_id' => $this->pismo,
            'language_id' => $this->jezik,
            'bookbind_id' => $this->povez,
            'format_id' => $this->post('format'),
            'publisher_id' => $this->izdavac,
            'publishDate' => $this->godinaIzdavanja != null ? Carbon::createFromFormat('Y', $this->godinaIzdavanja)->format('Y') : null,
            'isbn' => $this->isbn,
            'samples' => $this->knjigaKolicina,
            'description' => $this->kratki_sadrzaj,

//          this should be assigned through has many relation pivot table
            'categories' => $this->categories,
            'genres' => $this->genres,
            'authors' => $this->authors,

//            multimedia
            'pictures' => $this->pictures,
            'cover' => $this->cover,

            'present' => $this->present
        ]);
    }
}
