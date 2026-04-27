<?php

namespace OopBasics\TraitInterfaceAbstract\Traits;

use OopBasics\TraitInterfaceAbstract\Enums\SeatStatus;

trait HasSeats
{
    private array $seats = [];

    protected function setSeats(array $seats): void
    {
        $this->seats = $seats;
    }

    public function bookSeats(int $people): void
    {
        $availableSeats = $this->getAvailableSeats();

        if ($availableSeats < $people) {
            echo "Not enough seats available. Only " . $availableSeats . " seats are available.\n";
            return;
        }

        $bookedSeats = 0;
        foreach ($this->seats as $index => $seat) {
            if ($bookedSeats === $people) {
                break;
            }

            if ($seat === SeatStatus::Available) {
                $this->seats[$index] = SeatStatus::Taken;
                $bookedSeats++;
            }
        }

        echo $bookedSeats . " seats have been booked\n";
    }

    private function getAvailableSeats(): int
    {
        return count(array_filter(
            $this->seats,
            static fn(SeatStatus $seat): bool => $seat === SeatStatus::Available
        ));
    }
}
