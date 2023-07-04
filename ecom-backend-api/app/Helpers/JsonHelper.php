<?php

namespace App\Helpers;

class JsonHelper {
    public static function jsonResponseSuccess($data, $message = null) {
        return response()->json([
            'type' => 'sucess',
            'message' => $message,
            'result' => $data,
        ]);
    }

    public static function jsonResponseError($message, $data = null) {
        return response()->json([
            'type' => 'error',
            'message' => $message,
            'result' => $data,
        ]);
    }

    public static function jsonResponsePathError($request, $message, $data = null) {
        return response()->json([
            'type' => 'error',
            'message' => $message,
            'path' => $request->path(),
            'result' => $data,
        ]);
    }
}