<?php

namespace OopBasics\TraitInterfaceAbstract\Event;

use OopBasics\TraitInterfaceAbstract\Contracts\SeatingContract;
use OopBasics\TraitInterfaceAbstract\Traits\HasSeats;

abstract class SeatedEvent extends Event implements SeatingContract
{
    use HasSeats;
}
