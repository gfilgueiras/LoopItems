
/**
 * Copyright (c) 2025 Sua Empresa. Todos os direitos reservados.
 */
<?php

namespace App\Http\Resources\Utils;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaginationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'currentPage' => $this->resource->currentPage(),
            'perPage' => $this->resource->perPage(),
            'total' => $this->resource->total(),
            'lastPage' => $this->resource->lastPage(),
            'firstPage_url' => $this->resource->url(1),
            'lastPage_url' => $this->resource->url($this->resource->lastPage()),
            'nextPage_url' => $this->resource->nextPageUrl(),
            'prevPage_url' => $this->resource->previousPageUrl(),
        ];
    }
}
