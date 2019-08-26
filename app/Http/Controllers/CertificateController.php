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
     * @param CertificateService $certificateService
     * @author Phuoc Hua 2018-06-07
     */
    public function __construct(Request $request)
    {
        $this->_request = $request;
    }

    public function getList()
    {
        $params = $this->_request->all();

        $result = $this->_certificateService->getList($params);

        return Api::response($result);
    }
}