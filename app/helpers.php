<?php

use Illuminate\Support\Facades\Storage;

if (!function_exists('uploadFile')) {
    function uploadFile($file,$type)
    {
        $directory=$type.'/'.time().'/';
        $fileName=$file->getClientOriginalName();
        $file->storeAs($directory, $fileName, 'public_path');
        return 'uploads/'.$directory.$fileName;
    }
}
