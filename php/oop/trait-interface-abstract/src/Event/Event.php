<?php

namespace OopBasics\TraitInterfaceAbstract\Event;

use OopBasics\TraitInterfaceAbstract\Contracts\PricingContract;
use OopBasics\TraitInterfaceAbstract\Traits\HasMenu;
use OopBasics\TraitInterfaceAbstract\Traits\HasTicketPrice;

abstract class Event implements PricingContract
{
    use HasMenu, HasTicketPrice;

    public function buyTicket()
    {
        echo "Ticket has been bought.\nPrice of: " . $this->getTicketPrice() . "€ was paid.\n\n";
    }
}
