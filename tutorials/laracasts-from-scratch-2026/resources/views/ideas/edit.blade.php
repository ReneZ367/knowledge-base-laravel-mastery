<x-layout title="{{ $title }}">
    <form action="{{ route('ideas.update', $idea) }}" method="POST">
        @method('PATCH')
        @csrf
        <label for="description">edit Idea</label>
        <textarea name="description" id="description">{{ $idea->description }}</textarea>
        <p>Have an idea you want to save for later?</p>

        <div>
            <button type="submit">save</button>
            <button form="delete-idea-form" type="submit">Delete</button>
        </div>
    </form>

    <form id="delete-idea-form" action="{{ route('ideas.destroy', $idea->id) }}" method="POST">
        @method('DELETE')
        @csrf
    </form>
</x-layout>
