<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StatusStoreRequest;
use App\Http\Resources\StatusColletionResource;
use App\Http\Resources\StatusResource;
use App\Models\Status;
use App\Models\User;
use App\Service\Response\ApiResponse;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        $records = Status::Paginate(5);
        $user    = new User();

        return ApiResponse::data($records, StatusColletionResource::class, 200);
    }

    public function create(StatusStoreRequest $request)
    {
        $array      = [];
        $statusData = Status::query()->create($record->toPersist());
        return ApiResponse::check(new StatusResource($statusData), 201);
    }

    public function store(Request $request)
    {
        // -- cria registro vindo do create
    }

    public function show(string $id)
    {
        // -- Mostra o cadastro unico, sem formulario
    }

    public function edit(string $id)
    {
        // -- mostra o formulario preenchido para atualizar
    }

    public function update(Request $request, string $id)
    {
        // -- atualiza o registro vindo do edit
    }

    public function destroy(string $id)
    {
        // deleta o registro
    }
}
