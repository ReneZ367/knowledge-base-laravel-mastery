<?php

namespace OopBasics\TraitInterfaceAbstract\Event;

use OopBasics\TraitInterfaceAbstract\Enums\SeatStatus;
use OopBasics\TraitInterfaceAbstract\Enums\MenuItem;

class Movie extends SeatedEvent
{
    public function __construct()
    {
        $this->setTicketPrice(25.50);
        $this->setMenuItems([
            MenuItem::Popcorn->value => 10.00,
            MenuItem::Fanta->value => 5.00,
            MenuItem::Sprite->value => 5.00,
        ]);

        $this->setSeats([
            SeatStatus::Available,
            SeatStatus::Taken,
            SeatStatus::Available,
            SeatStatus::Available,
            SeatStatus::Taken,
            SeatStatus::Available,
            SeatStatus::Available,
            SeatStatus::Taken,
            SeatStatus::Available,
        ]);
    }
}
