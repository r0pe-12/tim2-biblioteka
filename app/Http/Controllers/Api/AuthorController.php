<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Author\AuthorResource;
use App\Http\Resources\Author\MainAuthorResource;
use App\Models\Author;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthorController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        //
        $authors = Author::all();

        return $this->sendResponse(AuthorResource::collection($authors), 'Authors Fetched Successfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        //
        $validator = \Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'biography' => [''],
            'image' => ['']
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());
        }

        $input = $validator->getData();

        $author = new Author($input);
        $author->save();

        return $this->sendResponse(new MainAuthorResource($author), 'Author Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Author $author)
    {
        //
        return $this->sendResponse(new MainAuthorResource($author), 'Author Fetched Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Author $author)
    {
        //
        $validator = \Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'biography' => [''],
            'image' => ['']
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());
        }

        $input = $validator->getData();

        $author->update($input);

        return $this->sendResponse(new MainAuthorResource($author), 'Author Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Author $author)
    {
        //
        try {
            $author->delete();
        } catch (\Exception $e) {
            return $this->sendError('Error', 'Unable to delete author');
        }

        return $this->sendResponse('', 'Author successfully removed.', Response::HTTP_OK);
    }
}
