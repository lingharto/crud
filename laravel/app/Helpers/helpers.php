<?php

if (!function_exists('successResponse')) {
    function successResponse ($message = 'success')
    {
        return response()->json(['message' => $message], 200);
    }
}

if (!function_exists('failedResponse')) {
    function failedResponse ($message = 'failed')
    {
        return response()->json(['message' => $message], 400);
    }
}
