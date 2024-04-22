<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;


class SignatureController extends Controller
{
    public function getSignatureImage($filename)
    {
        $path = storage_path('app/photos/signature/' . $filename);

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->file($path);
    }
}
