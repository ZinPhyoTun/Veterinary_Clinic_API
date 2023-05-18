<?php

namespace App;

class Helper {
    
    public static function success_api_response($result, $message, $data = [])
    {
        return response()->json(['result' => $result, 'message' => $message, 'data' => $data]);
    }

    public static function fail_api_response($result, $message)
    {
        return response()->json(['result' => $result, 'message' => $message]);
    }
}