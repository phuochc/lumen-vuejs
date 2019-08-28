<?php

namespace App\Http\Controllers;

use App\Services\AuthorService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorController extends Controller
{
    use ApiResponser;
    /**
     * The service to consume the authors micro service
     * @var AuthorService
     */
    public $authorService;

    public function __construct(AuthorService $authorService)
    {
        dd(1);
        $this->authorService = $authorService;
    }

    /**
     * Return the list of authors
     * @return Response|\Laravel\Lumen\Http\ResponseFactory
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function index()
    {
        return $this->successResponse($this->authorService->obtainAuthors());
    }

    /**
     * Create one new author
     * @param Request $request
     * @return Response|\Laravel\Lumen\Http\ResponseFactory
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function store(Request $request)
    {
        return $this->successResponse($this->authorService->createAuthor($request->all()), Response::HTTP_CREATED);
    }

    /**
     * Obtains and show one author
     * @param $author
     * @return Response|\Laravel\Lumen\Http\ResponseFactory
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function show($author)
    {
        return $this->successResponse($this->authorService->obtainAuthor($author));
    }

    public function update(Request $request, $author)
    {

    }

    public function destroy($author)
    {

    }
}
