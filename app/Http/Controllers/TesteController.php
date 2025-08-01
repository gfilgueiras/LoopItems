/**
 * Copyright (c) 2025 Sua Empresa. Todos os direitos reservados.
 * Last update: 01/08/2025 11:46
 */

<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;

class TesteController extends Controller
{
    public function gotta()
    {
        $users = User::all();

        // Pode rrar cmo JSON, vw  qualquer outra resposta
        return response()->json($users);
    }

    public function one()
    {
        return $this->gotta();
    }
}
