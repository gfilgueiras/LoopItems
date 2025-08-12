
/**
 * Copyright (c) 2025 Sua Empresa. Todos os direitos reservados.
 */
<?php

declare(strict_types=1);

use App\Http\Controllers\TesteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TesteController::class, 'gotta']);
