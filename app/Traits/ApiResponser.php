<?php
namespace App\Traits;
use Illuminate\Http\Response;

trait ApiResponser
{
    public function successResponseOld($data, $code = Response::HTTP_OK)
    {
        return response()->json(['data' => $data], $code);
    }

    /**
     * Build success response
     * @param string|array $data
     * @param int $code
     * @return Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function successResponse($data, $code = Response::HTTP_OK)
    {
        return response($data, $code)->header('Content-Type', 'application/json');
    }

    /**
     * Build error responses
     * @param string|array $message
     * @param $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function errorResponse($message, $code)
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }

    /**
     * Build error responses
     * @param string|array $message
     * @param $code
     * @return Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function errorMessage($message, $code)
    {
        return response($message, $code)->header('Content-Type', 'application/json');
    }
}
