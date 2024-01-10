<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function resData($data = null)
    {
        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    }

    protected function resPagedData(LengthAwarePaginator $pagedData)
    {
        return response()->json([
            'success' => true,
            'data' => $pagedData->items(),
            'page' => $pagedData->currentPage(),
            'total' => $pagedData->total(),
        ], 200);
    }

    protected function resError($errorMessage, $showType = null, $errorCode = 0, $status = 400)
    {
        return response()->json([
            'success' => false,
            'errorCode' => $errorCode,
            'errorMessage' => $errorMessage,
            'showType' => $showType ? $showType : config('constants.error_show_types.error'),
        ], $status);
    }

    protected function resFormError($errors, $status = 200)
    {
        return response()->json([
            'success' => false,
            'errorMessage' => 'Error submitting form',
            'data' => $errors,
        ], $status);
    }
}
