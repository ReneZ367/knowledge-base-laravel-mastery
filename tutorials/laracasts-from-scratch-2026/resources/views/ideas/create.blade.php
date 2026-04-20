<x-layout title="{{ $title }}">
    <form action="{{ route('ideas.store') }}" method="POST">
        @csrf
        <label for="description">New Idea</label>
        <textarea name="description" id="description" /></textarea>
        <p>Have an idea you want to save for later?</p>

        <div>
            <button type="submit">save</button>
        </div>
    </form>
</x-layout>
