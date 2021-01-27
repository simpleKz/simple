<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 12.07.2020
 * Time: 13:21
 */

namespace App\Exceptions\Api;

use App\Core\Utils\RespUtil;
use App\Exceptions\BaseException;
use App\Http\Utils\ResponseUtil;

class ApiServiceException extends BaseException
{
    protected $code;
    protected $errors;
    protected $success;

    /**
     * ServiceException constructor.
     * @param $code
     * @param $success
     * @param $errors
     */
    public function __construct($code, $success, Array $errors)
    {
        $this->code = $code;
        $this->success = $success;
        $this->errors = $errors;
    }

    public function getApiResponse()
    {

        return ResponseUtil::makeResponse($this->code, $this->success, $this->errors);
    }
}
