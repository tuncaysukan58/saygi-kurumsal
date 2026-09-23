<?php

namespace App\Http\Controllers\Admin\Concerns;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait HandlesUploads
{
    /**
     * Store an uploaded image on the public disk and return its path.
     */
    protected function storeImage(UploadedFile $file, string $folder): string
    {
        return $file->store($folder, 'public');
    }

    /**
     * Replace an existing image: stores the new file (when present), deletes the old one, and
     * returns the path that should be persisted (new path, or the untouched old path).
     */
    protected function replaceImage(?string $oldPath, ?UploadedFile $newFile, string $folder): ?string
    {
        if (! $newFile) {
            return $oldPath;
        }

        if ($oldPath) {
            Storage::disk('public')->delete($oldPath);
        }

        return $this->storeImage($newFile, $folder);
    }

    protected function deleteImage(?string $path): void
    {
        if ($path) {
            Storage::disk('public')->delete($path);
        }
    }
}
