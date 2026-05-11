<?php

namespace App\Enums\Traits;

use Illuminate\Contracts\Support\Htmlable;

trait UseValueAsLabel
{
    public function getLabel(): string|Htmlable|null
    {
        if (! $this instanceof \BackedEnum) {
            return null;
        }

        return (string) $this->value;
    }
}
