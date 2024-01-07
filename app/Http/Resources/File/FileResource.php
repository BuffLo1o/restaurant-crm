<?php

namespace App\Http\Resources\File;

use App\Http\Resources\JsonResource;
use App\Models\File;
use Illuminate\Http\Request;

/**
 * @property File $resource
 *
 * @mixin File
 */
class FileResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'       => $this->id,
            'path'     => $this->path,
            'filename' => $this->filename,
            'size'     => $this->size,
        ];
    }
}
