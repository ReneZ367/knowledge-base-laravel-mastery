<?php

namespace OopBasics\TraitInterfaceAbstract\Traits;

trait HasMenu
{
    private array $items = [];

    protected function setMenuItems(array $items): void
    {
        $this->items = $items;
    }

    public function buyItem(string $item)
    {
        if (!array_key_exists($item, $this->items)) {
            echo "Item not found in menu.\n";
            return;
        }

        echo "Item " . $item . " has been bought. Price of: " . $this->items[$item] . "€ was paid.\n";
    }
}
