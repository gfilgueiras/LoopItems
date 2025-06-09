<?php

namespace App\Service\Response;
use Illuminate\Http\JsonResponse;

readonly class ApiResponse
{
    public static function check(object $data, $statusCode = 200): JsonResponse
    {
        if($data && $data->exists && $statusCode === 200) {
            return self::data($data);
        }

        if($data && $data->exists && $statusCode !== 200) {
            return self::success(placeholders: ['Status'], data: $data);
        //     return response()->json([
        //         'status' => 201,
        //         'data' => $data,
        //         'message' => 'Has been created.'
        //     ], 201);
        };

        return response()->json([
            'status' => 422,
            'message' => 'You got a error for now, sorry :).',
        ], 422);
    }

    public static function error(string $message, array $placeholders = []): JsonResponse
    {
        // $message = DISPLAY_ERRORS ? $message : 'Erro ao processar a solicitação.';
        return response()->json(['message' => $message], 422);
    }

    public static function data(mixed $data): JsonResponse
    {
        return response()->json($data);
    }

    public static function success(string $tipo = 'sucesso', mixed $data = [], array $placeholders = []): JsonResponse
    {
        $message = self::mensagensSucesso($tipo);
        $message = self::replacePlaceholders($message, $placeholders);
        return response()->json(array_filter(['message' => $message, 'data' => $data]));
    }

    public static function info(string $message, array $placeholders = []): JsonResponse
    {
        $message = self::replacePlaceholders($message, $placeholders);
        return response()->json(['message' => $message]);
    }

    public static function notFound(array $placeholders = []): JsonResponse
    {
        $message = ":atributo não encontrado!";
        $replaced = self::replacePlaceholders($message, $placeholders);
        return response()->json(['message' => $replaced], 404);
    }

    private static function replacePlaceholders(string $message, array $placeholders): string
    {
        foreach ($placeholders as $key => $value) {
            $message = str_replace(":atributo", $value, $message);
        }
        return $message;
    }

    private static function mensagensSucesso(string $tipo): string
    {
        return match ($tipo) {
            'exclusao' => ':atributo excluído(a) com sucesso.',
            'atualizacao' => ':atributo atualizado(a) com sucesso.',
            'sucesso' => ':atributo cadastrado(a) com sucesso.',
            default => 'Mensagem não parametrizada.'
        };
    }

    Enum
        ->
}
