<?php

namespace App\Traits;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

trait FileUploadTrait
{
    /**
     * Upload an image to the specified folder.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $fieldName
     * @param string $folder
     * @param string|null $disk
     * @return string|null
     */
    public function uploadImage(Request $request, string $fieldName, string $folder = 'uploads', string $disk = 'public'): ?string
    {
        if ($request->hasFile($fieldName) && $request->file($fieldName)->isValid()) {
            $file = $request->file($fieldName);

            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs($folder, $filename, $disk);

            return $path;
        }

        return null;
    }
}
