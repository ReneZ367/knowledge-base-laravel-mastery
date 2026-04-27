<?php

namespace OopBasics\TraitInterfaceAbstract\Event;

use OopBasics\TraitInterfaceAbstract\Enums\MenuItem;

class Concert extends Event
{
    public function __construct()
    {
        $this->setTicketPrice(13.50);
        $this->setMenuItems([
            MenuItem::Coke->value => 5.00,
            MenuItem::Water->value => 3.00,
            MenuItem::AppleJuice->value => 8.00,
        ]);
    }
}
