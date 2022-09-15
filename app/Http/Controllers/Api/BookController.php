<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Book\BookByCategoryCollection;
use App\Http\Resources\Book\BookNoFilterCollection;
use App\Http\Resources\Category\CategoryTileCollection;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class BookController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        //
        $books = Book::all();

        return BookNoFilterCollection::collection($books);
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function categories()
    {
        //
        $categories = Category::all();

        return CategoryTileCollection::collection($categories);
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function byCategory(Category $category)
    {
        //
        $books = $category->books;

        return BookByCategoryCollection::collection($books);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }
}
