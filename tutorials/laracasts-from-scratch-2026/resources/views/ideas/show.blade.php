<x-layout>
    {{ $idea->description }}
    {{ $idea->state }}

    <a href="{{ route('ideas.edit', $idea->id) }}">Edit</a>
    <a href="{{ route('ideas.index') }}">Back</a>
</x-layout>
