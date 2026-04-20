<x-layout title="{{ $title }}">
    <a href="{{ route('ideas.create') }}">Create New</a>
    @if ($ideas->count())
        <h3>youre Ideas:</h3>
        @foreach ($ideas as $idea)
            <a href="{{ route('ideas.show', $idea->id) }}">
                <li>{{ $idea->description }}</li>
                <li>{{ $idea->state }}</li>
            </a>
        @endforeach
    @endif
</x-layout>
