<?php

namespace App\Http\Controllers;

use App\Exceptions\ControllerException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function successResponse($data): JsonResponse
    {
        return response()->json([
            'data' => $data,
        ]);
    }

    protected function getException(?string $message = null): ControllerException
    {
        return new ControllerException($message ?? '');
    }
}
