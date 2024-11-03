<?php

declare(strict_types=1);

namespace App\Enums;

enum OrderStatus: int
{
    case ORDERED = 1;
    case PREP = 2;
    case BAKE = 3;
    case QUALITY_CHECK = 4;
    case READY = 5;

    public function label(): string
    {
        return match($this) {
            self::ORDERED => 'Pizza commandée',
            self::PREP => 'Préparation en cours',
            self::BAKE => 'Cuisson en cours',
            self::QUALITY_CHECK => 'Contrôle qualité',
            self::READY => 'Prête à être livrée',
        };
    }

    public static function labels(): array
    {
        return [
            self::ORDERED->value => self::ORDERED->label(),
            self::PREP->value => self::PREP->label(),
            self::BAKE->value => self::BAKE->label(),
            self::QUALITY_CHECK->value => self::QUALITY_CHECK->label(),
            self::READY->value => self::READY->label(),
        ];
    }
}
