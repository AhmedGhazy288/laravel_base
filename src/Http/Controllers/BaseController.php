<?php

namespace IconTs\Base\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BController;

class BaseController extends BController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /**
     * success response method.
     *
     * @return JsonResponse
     */
    public function sendResponse($result, $message = null): JsonResponse
    {
        $response['success'] = true;

        if (!is_null($message)) {
            $response['message'] = $message;
        }

        $response['data'] = $result;

        return response()->json($response);
    }

    /**
     * return error response.
     *
     * @return JsonResponse
     */
    public function sendError($error, $errorMessages = [], $code = 401): JsonResponse
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if (!empty($errorMessages)) {
            $response['errors'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}
