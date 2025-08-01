<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;

class TesteController extends Controller
{
    public function gotta()
    {
        $users = User::all();

        // Pode rrar cmo JSON, vw ou qualquer outra resposta
        return response()->json($users);
    }

    public function one()
    {
        return $this->gotta();
    }
}
