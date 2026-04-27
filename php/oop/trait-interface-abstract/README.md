# Trait, interface, and abstract class demo

Small PHP exercise showing how **abstract classes**, **traits**, and **interfaces** fit together. The domain is simple event types (concert, play, movie) with ticket pricing, optional seating, and a snack menu.

**Scope:** learning demo only, not a product or library. No tests, no HTTP layer, no persistence on purpose so the OOP mechanics stay easy to read.

## Requirements

- PHP 8.1 or newer
- [Composer](https://getcomposer.org/)

## Setup

```bash
composer install
```

This generates the PSR-4 autoloader under `vendor/`. The `vendor/` directory is gitignored; clone the repo and run `composer install` locally.

## Run

```bash
php index.php
```

The script constructs a few event instances and exercises `buyTicket()`, `bookSeats()`, and `buyItem()`.

## Layout

| Path                                             | Role                                                                      |
| ------------------------------------------------ | ------------------------------------------------------------------------- |
| `src/Event/Event.php`                            | Abstract base: ticket purchase flow, composes pricing and menu traits     |
| `src/Event/SeatedEvent.php`                      | Abstract seated events: binds `HasSeats` + `SeatingContract` in one place |
| `src/Event/Concert.php`, `Play.php`, `Movie.php` | Concrete events; plays and movies extend `SeatedEvent`                    |
| `src/Contracts/`                                 | `PricingContract`, `SeatingContract` capability interfaces                |
| `src/Traits/`                                    | `HasTicketPrice`, `HasMenu`, `HasSeats` shared behavior                   |
| `src/Enums/`                                     | `MenuItem` (string-backed), `SeatStatus` (unit enum)                      |
| `notes.md`                                       | Short personal notes on traits vs abstract classes                        |

Namespace root: `OopBasics\TraitInterfaceAbstract\`.
