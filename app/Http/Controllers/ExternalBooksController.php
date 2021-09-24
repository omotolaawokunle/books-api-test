<?php

namespace App\Http\Controllers;

use App\Http\Resources\ExternalBooksResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ExternalBooksController extends Controller
{
    public function getBooks(Request $request)
    {
        $books = Http::get("https://www.anapioficeandfire.com/api/books?name={$request->name}")->json();
        return $this->success(200, ExternalBooksResource::collection($books));
    }
}
