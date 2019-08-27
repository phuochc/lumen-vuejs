<?php
namespace App\Http\Controllers;

use App\Models\Book;
use App\Services\BookService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the books micro service
     * @var BookService
     */
    public $bookService;

    /**
     * Create a new controller instance.
     * @param BookService $bookService
     * @return void
     */
    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    /**
     * Return the list of Books
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $books = Book::with('author')->get();

        return $this->successResponse($books);
    }

    /**
     * Create one new Book
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|max:100',
            'description' => 'required|max:255',
            'price' => 'required|integer|min:1',
            'author_id' => 'required|integer|exists:authors,id'
        ];

        $this->validate($request, $rules);

        $book = Book::create($request->all());

        return $this->successResponse($book, Response::HTTP_CREATED);
    }

    /**
     * Obtains and show one Book
     * @param $book
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($book)
    {
        $book = Book::with('author')->findOrFail($book);

        return $this->successResponse($book);
    }

    /**
     * Update an existing Book
     * @param Request $request
     * @param $book
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $book)
    {
        $rules = [
            'title' => 'required|max:100',
            'description' => 'required|',
            'price' => 'required|integer',
            'author_id' => 'required|integer'
        ];

        $this->validate($request, $rules);

        $book = Book::findOrFail($book);

        $book->fill($request->all());

        if ($book->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $book->save();

        return $this->successResponse($book);
    }

    /**
     * Remove an existing Book
     * @param $book
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($book)
    {
        $book = Book::findOrFail($book);

        $book->delete();

        return $this->successResponse($book);
    }
}
