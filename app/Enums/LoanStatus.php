<?php

namespace App\Enums;

enum LoanStatus: string
{
    case BORROWED = 'borrowed';
    case RETURNED = 'returned';
    case OVERDUE  = 'overdue';
    case LOST     = 'lost';
    case CANCELLED = 'cancelled';

    // Etiqueta legible para la UI o respuestas de API
    public function label(): string
    {
        return match ($this) {
            self::BORROWED => 'En préstamo',
            self::RETURNED => 'Devuelto',
            self::OVERDUE  => 'Vencido',
            self::LOST     => 'Perdido',
            self::CANCELLED => 'Cancelado',
        };
    }

    // Método auxiliar para lógica de negocio
    public function isReturnable(): bool
    {
        return in_array($this, [self::BORROWED, self::OVERDUE]);
    }
}