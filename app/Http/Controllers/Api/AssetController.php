<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Assets\UploadRequest;

class AssetController extends Controller
{
    /**
     * Upload a file
     * @group General
     * you can access it using {{baseUrl}}/storage/images/{filename}
     * @authenticated
     * @responseFile status=422 scenario="Invalid inputs" storage/responses/unprocessable-content.json
     * @responseFile status=403 scenario="Forbidden" storage/responses/forbidden.json
     * @responseFile status=200 scenario="unauthenticated user upload an image" storage/responses/upload.json
     */
    public function upload(UploadRequest $request)
    {
        if ($request->file('file')) {
            $path = $request->file->store('public/images');
            $filename = $request->file->hashName();
            return response()->json(["filename" => $filename]);
        }
    }
}
