<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function success(int $statusCode = 200, $data = [], string $message = "", $responseCode = false)
    {
        $responseCode = $responseCode ?: $statusCode;
        if ($message == "") {
            return response()->json(['status_code' => $statusCode, 'status' => 'success', 'data' => $data], $responseCode);
        } else {
            return response()->json(['status_code' => $statusCode, 'status' => 'success', 'message' => $message, 'data' => $data], $responseCode);
        }
    }

    public function error(int $status_code = 400, $data = [])
    {
        return response()->json(['status_code' => $status_code, 'status' => 'error', 'data' => $data], $status_code);
    }
}
