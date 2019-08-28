<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class AuthorService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the authors service
     * @var string
     */
    public $baseUri;

    public function __construct()
    {
        $this->baseUri = env('AUTHORS_SERVICE_BASE_URL');
    }

    /**
     * Obtain the full list of author from the author service
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function obtainAuthors()
    {
        return $this->performRequest('GET', '/books');
    }

    /**
     * Create one author using the author service
     * @param $data
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createAuthor($data)
    {
        return $this->performRequest('POST', '/authors', $data);
    }

    /**
     * Obtain one single author from the author service
     * @param $author
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function obtainAuthor($author)
    {
        return $this->performRequest('GET', '/authors/'.$author);
    }
}
