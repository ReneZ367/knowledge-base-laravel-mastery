# Traits

- An interface can't be used in a trait.
- A trait can be used to fulfill an interface

# Abstract Classes

- Abstract classes are used when I don't want to instantiate the parent class, but use its params

### Why would I use interfaces and traits then if I can just use abstract classes that kinda do both?

- A class can only extend 1 other class
- If I've already extended a class:
  - but still want a helper function I can use -> trait
  - or I need an additional interface for only a specific class
