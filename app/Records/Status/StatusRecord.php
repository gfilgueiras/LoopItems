
/**
 * Copyright (c) 2025 Sua Empresa. Todos os direitos reservados.
 */
<?php

namespace App\Records\Status;

readonly class StatusRecord
{
    public function __construct(
        private string $title,
    ) {}

    public function getTitle(): string
    {
        return $this->title;
    }

    public function toPersist(): array
    {
        return [
            'title' => $this->getTitle(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            title: $data['title'],
        );
    }
}
