<?php

namespace App;

class Helper {
    
    /**
     * api_response
     *
     * @param  $status, $message, $data = Optional
     * @return mixed json_data
     */
    public static function api_response($status, $message, $data = [])
    {
        return response()->json(['status' => $status, 'message' => $message, 'data' => $data]);
    }
}