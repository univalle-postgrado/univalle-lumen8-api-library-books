<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    use ApiResponser;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function index() {
        $books = Book::all();

        return $this->validResponse($books);
    }

    public function read($id) {
        $book = Book::findOrFail($id);

        return $this->validResponse($book);
    }

    public function create(Request $request) {
        $rules = [
            'title' => 'required|max:180|unique:books',
            'isbn' => 'max:60',
            'publisher' => 'required|max:90',
            'gender' => 'required|in:ADVENTURE,FANTASY,FICTION,HORROR,MYSTERY,NOVEL,ROMANCE,TRAGEDY',
            'year' => 'integer|min:1600',
            'created_by' => 'required',
            'author_id' => 'required|integer|min:1'
        ];
        $this->validate($request, $rules);

        $data = $request->all();
        $book = Book::create($data);

        return $this->successResponse($book, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id) {
        $rules = [
            'title' => 'required|max:180|unique:books,title,' . $id,
            'isbn' => 'max:60',
            'publisher' => 'required|max:90',
            'gender' => 'required|in:ADVENTURE,FANTASY,FICTION,HORROR,MYSTERY,NOVEL,ROMANCE,TRAGEDY',
            'year' => 'integer|min:1600',
            'updated_by' => 'required',
            'author_id' => 'required|integer|min:1'
        ];
        $this->validate($request, $rules);

        $data = $request->all();

        $book = Book::find($id);

        $book->fill($data);
        $book->save();
        return $this->successResponse($book, Response::HTTP_OK);
    }

    public function patch($id, Request $request) {
        $rules = [
            'title' => 'max:180|unique:books,title,' . $id,
            'isbn' => 'max:60',
            'publisher' => 'max:90',
            'gender' => 'in:ADVENTURE,FANTASY,FICTION,HORROR,MYSTERY,NOVEL,ROMANCE,TRAGEDY',
            'year' => 'integer|min:1600',
            'author_id' => 'integer|min:1'
        ];
        $this->validate($request, $rules);

        $book = Book::findOrFail($id);

        $data = $request->all();
        $book->fill($data);
        $book->save();
        return $this->successResponse($book, Response::HTTP_OK);
    }

    public function delete($id) {
        $book = Book::findOrFail($id);
        $book->delete();
        return $this->successResponse($book, Response::HTTP_OK);
    }

}
