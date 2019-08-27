<?php
namespace App\Repositories;

use App\Models\Book;

class BookRepository
{
    /**
     * Return the list of Books
     * @return Book[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $books = Book::all();

        return $books;
    }
}
