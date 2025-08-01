<?php
// ╔═════════════════════════════════════════════════════════════════════════════════════════════════════╗
// ║ ◎                                                                                                 ◎ ║
// ║     _____                                      _____                   _                            ║
// ║    / ___ \       _                            (____ \                 | |                           ║
// ║   | |   | | ____| |_  ___  ____  _   _  ___    _   \ \ ____ _   _ ____| | ___  ____   ____  ____    ║
// ║   | |   | |/ ___)  _)/ _ \|  _ \| | | |/___)  | |   | / _  ) | | / _  ) |/ _ \|  _ \ / _  )/ ___)   ║
// ║   | |___| ( (___| |_| |_| | | | | |_| |___ |  | |__/ ( (/ / \ V ( (/ /| | |_| | | | ( (/ /| |       ║
// ║    \_____/ \____)\___)___/| ||_/ \____(___/   |_____/ \____) \_/ \____)_|\___/| ||_/ \____)_|       ║
// ║                           |_|                                                 |_|                   ║
// ║                                                                                                     ║
// ║   Created at:   01/08/2025 13:20                                                                 ║
// ║   Last update:  01/08/2025 13:20                                                                 ║
// ║   Project:      Sou Nail Desing                                                                 ║
// ║                                                                                                     ║
// ║   Author       Gustavo Filgueiras                                                                       ║
// ║   AuthorEmail  gfilgueirasrj@gmail.com                                                                      ║
// ║   License      MIT                                                                    ║
// ║   Copyright    2025 Octopus Developer                                                    ║
// ║ ◎                                                                                                 ◎ ║
// ╚═════════════════════════════════════════════════════════════════════════════════════════════════════╝

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;

class TesteController extends Controller
{
    public function gotta()
    {
        $users = User::all();

        // Pode rrar cmo JSON, vw qualquer outra respos
        return response()->json($users);
    }

    public function one()
    {
        return $this->gotta();
    }
}
