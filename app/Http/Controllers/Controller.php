<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function formatResponse(int $error, int $code, string $msg, mixed $data): object
    {
        return response()->json([
            'error' => $error,
            'code' => $code,
            'msg' => $msg,
            'data' => $data,
        ]);
    }
}
