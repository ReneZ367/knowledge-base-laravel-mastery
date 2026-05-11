<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

use App\Enums\Traits\UseValueAsLabel;

enum FeatureType: string implements HasColor, HasIcon, HasLabel
{
    use UseValueAsLabel;

    case Feature = 'feature';
    case Bugfix = 'bugfix';
    case Integration = 'integration';

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Feature => 'primary',
            self::Bugfix => 'warning',
            self::Integration => 'info',
        };
    }

    public function getIcon(): string|null
    {
        return match ($this) {
            self::Feature => 'heroicon-o-star',
            self::Bugfix => 'heroicon-o-bug-ant',
            self::Integration => 'heroicon-o-link',
        };
    }
}
