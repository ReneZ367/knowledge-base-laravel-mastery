@php($titleWasPassed = $attributes->has('title'))
@props([
    'title' => 'laravel 2026',
])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $titleWasPassed ? $title . ' | laravel 2026' : $title }}</title>
</head>

<body>
    <x-navigation></x-navigation>
    {{ $slot }}
</body>

</html>
