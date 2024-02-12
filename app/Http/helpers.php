<?php

/**
 * this uploaded file
 * @param string $path
 * @param binary $request file
 * @return full path of uploaded
 */
if (!function_exists('uploadFile')) {
    function uploadFile($file, $path)
    {
        $file->getClientOriginalName();
        $filename = $file->hashName();
        $file->move($path, $filename);
        $fullpath = $path . $filename;
        return $fullpath;
    }
}

/**
 * get system value from db
 * @return boolean
 */
if (!function_exists('isRtl')) {
    function isRtl()
    {
        return app()->getLocale() == 'ar' ? true : false;
    }
}

/**
 * response json
 */
if (!function_exists('responseJson')) {
    function responseJson($status, $message = "", $data = null, $statusCode = 200)
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }
}
