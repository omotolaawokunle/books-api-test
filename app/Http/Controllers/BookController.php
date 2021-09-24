<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBook;
use App\Http\Resources\ExternalBooksResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $books = Book::query();
        if ($name = $request->name) $books = $books->where('name', "LIKE", "%$name%");
        if ($country = $request->country) $books = $books->where('country', "LIKE", "%$country%");
        if ($publisher = $request->publisher) $books = $books->where('publisher', "LIKE", "%$publisher%");
        if ($release_date = $request->release_date) $books = $books->whereDate('release_date', $release_date);
        $books = ExternalBooksResource::collection($books->get()->toArray());
        return $this->success(200, $books);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBook $request)
    {
        $data = $request->validated();
        $book = Book::create($data);
        return $this->success(201, new ExternalBooksResource($book->toArray()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return $this->success(200, new ExternalBooksResource($book->toArray()));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBook $request, Book $book)
    {
        $book->update($request->validated());
        return $this->success(200, new ExternalBooksResource($book->fresh()->toArray()), "The book {$book->name} was updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        if ($book->delete()) {
            return $this->success(204, [], "The book {$book->name} was deleted successfully!", 200);
        }
    }
}
