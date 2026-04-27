<?php

namespace OopBasics\TraitInterfaceAbstract\Traits;

trait HasTicketPrice
{
    private float $ticketPrice;

    public function getTicketPrice(): float
    {
        return $this->ticketPrice;
    }

    protected function setTicketPrice(float $ticketPrice): void
    {
        $this->ticketPrice = $ticketPrice;
    }
}
