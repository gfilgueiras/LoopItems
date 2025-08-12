<?php
/* ╔═════════════════════════════════════════════════════════════════════════════════════════════════════╗ */
/* ║       _____                                      _____                   _                          ║ */
/* ║      / ___ \       _                            (____ \                 | |                         ║ */
/* ║     | |   | | ____| |_  ___  ____  _   _  ___    _   \ \ ____ _   _ ____| | ___  ____   ____  ____  ║ */
/* ║     | |   | |/ ___)  _)/ _ \|  _ \| | | |/___)  | |   | / _  ) | | / _  ) |/ _ \|  _ \ / _  )/ ___) ║ */
/* ║     | |___| ( (___| |_| |_| | | | | |_| |___ |  | |__/ ( (/ / \ V ( (/ /| | |_| | | | ( (/ /| |     ║ */
/* ║      \_____/ \____)\___)___/| ||_/ \____(___/   |_____/ \____) \_/ \____)_|\___/| ||_/ \____)_|     ║ */
/* ║                             |_|                                                 |_|                 ║ */
/* ║                                                                                                     ║ */
/* ║   Author:      Gustavo Filgueiras <gfilgueirasrj@gmail.com>                                         ║ */
/* ║   Created at:  12/08/2025 20:33:57                                                                  ║ */
/* ║                                                                                                     ║ */
/* ║   Last update: 12/08/2025 20:33:57                                                                  ║ */
/* ║   User update: Gustavo Filgueiras <gfilgueirasrj@gmail.com>                                         ║ */
/* ║   Project:     Base Project Laravel (RVA)                                                           ║ */
/* ║   License:     GNU                                                                                  ║ */
/* ║   Copyright:   2025 Octopus Developer                                                               ║ */
/* ╚═════════════════════════════════════════════════════════════════════════════════════════════════════╝ */

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StatusStoreRequest;
use App\Http\Resources\StatusColletionResource;
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
        $array = [];
        return $array;
    }

    public function store(Request $request)
    {
        // -- cria registro vindo do creat
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
