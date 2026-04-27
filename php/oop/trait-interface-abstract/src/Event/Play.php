<?php

namespace OopBasics\TraitInterfaceAbstract\Event;

use OopBasics\TraitInterfaceAbstract\Enums\SeatStatus;
use OopBasics\TraitInterfaceAbstract\Enums\MenuItem;

class Play extends SeatedEvent
{
    public function __construct()
    {
        $this->setTicketPrice(17.50);
        $this->setMenuItems([
            MenuItem::Ale->value => 10.00,
            MenuItem::Sprite->value => 5.00,
            MenuItem::Nachos->value => 10.00,
        ]);

        $this->setSeats([
            SeatStatus::Available,
            SeatStatus::Taken,
            SeatStatus::Available,
            SeatStatus::Taken,
            SeatStatus::Taken,
            SeatStatus::Taken,
            SeatStatus::Available,
            SeatStatus::Available,
            SeatStatus::Available,
        ]);
    }
}
