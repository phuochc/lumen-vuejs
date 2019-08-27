<?php

namespace App\Http\Controllers;

use App\Http\Requests\Authors\StoreAuthorRequest;
use App\Models\Author;
use App\Repositories\AuthorRepository;
use App\Services\AuthorService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorController extends Controller
{
    use ApiResponser;
    protected $_authorRepository;
    /**
     * The service to consume the authors micro service
     * @var AuthorService
     */
    public $authorService;

    public function __construct(AuthorRepository $authorRepository, AuthorService $authorService)
    {
        $this->_authorRepository = $authorRepository;
        $this->authorService = $authorService;
    }

    /**
     * Return the list of Authors
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $authors = $this->_authorRepository->index();

        return $this->successResponse($authors);
    }

    /**
     * Create one new Author
     * @param Request $request
     * @param StoreAuthorRequest $storeAuthorRequest
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, StoreAuthorRequest $storeAuthorRequest)
    {
        $this->validate($request, $storeAuthorRequest->rules());

        $author = $this->_authorRepository->create($request->all());

        return $this->successResponse($author, Response::HTTP_CREATED);
    }

    /**
     * Obtains and show one Author
     * @param $author
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($author)
    {
        $author = $this->_authorRepository->show($author);

        return $this->successResponse($author);
    }

    public function update(Request $request, StoreAuthorRequest $storeAuthorRequest, $author)
    {
        $this->validate($request, $storeAuthorRequest->rules());

        $author = $this->_authorRepository->show($author);

        $author->fill($request->all());

        if ($author->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $author->save();

        return $this->successResponse($author);
    }

    public function destroy($author)
    {
        $author = Author::findOrFail($author);

        $author->delete();

        return $this->successResponse($author);
    }
}
