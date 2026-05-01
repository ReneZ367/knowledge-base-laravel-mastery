<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EditProfile extends \Filament\Auth\Pages\EditProfile
{
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                $this->getNameFormComponent(),
                $this->getEmailFormComponent(),
                TextInput::make('phone')
                    ->tel()
                    ->minLength(18)
                    ->maxLength(18)
                    ->prefixIcon('heroicon-o-phone')
                    ->mask('+99 999 999 999 99')
                    ->required(),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
                $this->getCurrentPasswordFormComponent(),
            ]);
    }
}
