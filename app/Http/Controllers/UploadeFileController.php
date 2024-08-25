<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UploadeFileController extends Controller
{
    public function upload_file(Request $request)
    {
        $file = $request->file('upload');
        $type = $request->query('amp;type');;
        $directory=$type.'/'.time().'/';
        $fileName=$file->getClientOriginalName();
        $file->storeAs($directory, $fileName, 'public_path');
        $url = asset('uploads/' . $directory.$fileName);
        Log::info($type);
         return response()->json([
            'uploaded' => 1,
            'fileName' => $fileName,
            'url' => $url
        ]);
    }
}
