/**
 * Copyright (c) 2026 Sua Empresa. Todos os direitos reservados.
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

        // Pode rrar como JSON, vw ou qualquer outra resposta
        return response()->json($users);
    }

    public function one()
    {
        return $this->gotta();
    }
}
