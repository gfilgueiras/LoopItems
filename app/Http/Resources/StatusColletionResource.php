
/**
 * Copyright (c) 2025 Sua Empresa. Todos os direitos reservados.
 */
<?php

namespace App\Http\Resources;

use App\Http\Resources\Utils\PaginationResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class StatusColletionResource extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        $dataAll = $this->collection->transform(function ($status) {
            return [
                'id' => $status->id,
                'title' => $status->title,
                'created_at' => $status->created_at,
                'updated_at' => $status->updated_at,
            ];
        })->all();

        return [
            'data' => $dataAll,
            'pagination' => new PaginationResource($this)
        ];
    }
}
