<?php
namespace App\Repositories;

use App\Models\Author;

class AuthorRepository
{
    /**
     * Return the list of Authors
     * @return Author[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $authors = Author::all();

        return $authors;
    }

    /**
     * Save the author in database
     * @param $authorData
     * @return mixed
     */
    public function create($authorData)
    {
        $author = Author::create($authorData);

        return $author;
    }

    /**
     * Obtains and show one Author
     * @param $author
     * @return mixed
     */
    public function show($author)
    {
        $author = Author::findOrFail($author);

        return $author;
    }
}
