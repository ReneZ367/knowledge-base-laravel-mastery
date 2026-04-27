<?php
require __DIR__ . '/vendor/autoload.php';

use OopBasics\TraitInterfaceAbstract\Event\Concert;
use OopBasics\TraitInterfaceAbstract\Event\Movie;
use OopBasics\TraitInterfaceAbstract\Event\Play;
use OopBasics\TraitInterfaceAbstract\Enums\MenuItem;

$concert = new Concert;

$concert->buyTicket();
$concert->buyItem(MenuItem::Coke->value);

$play = new Play;

$play->buyTicket();
$play->bookSeats(2);
$play->buyItem(MenuItem::Ale->value);


$movie = new Movie;

$movie->buyTicket();
$movie->bookSeats(10);
$movie->buyItem(MenuItem::Popcorn->value);
