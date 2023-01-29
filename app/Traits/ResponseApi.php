<?php

namespace App\Traits;

trait ResponseApi
{
	/*
    |--------------------------------------------------------------------------
    | RESPONSE SUCCESS
    |--------------------------------------------------------------------------
    */

	public function sendResponse($result, $message, $code = 200)
	{
		$response = [
			'success' => true,
			'message' => $message,
		];

		if (!empty($result)) {
			$response['data'] = $result;
		}

		return response()->json($response, $code, [], JSON_PRESERVE_ZERO_FRACTION);
	}

	/*
    |--------------------------------------------------------------------------
    | RESPONSE ERROR
    |--------------------------------------------------------------------------
    */

	public function sendError($message, $error = [], $code = 500)
	{
		$response = [
			'success' => false,
			'message' => $message,
		];

		if (!empty($error)) {
			$response['data'] = $error;
		}

		return response()->json($response, $code);
	}
}
