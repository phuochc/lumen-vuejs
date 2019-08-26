<?php

namespace app\Controllers;

use App\Http\Controllers\Controller;
use App\Libraries\Api;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    protected $_request;

    /**
     * CertificateController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->_request = $request;
    }

    public function getList()
    {
        $params = $this->_request->all();
    }
}
