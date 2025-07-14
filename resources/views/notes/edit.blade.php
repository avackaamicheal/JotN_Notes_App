<div>
    <h2>Edit Note</h2>

    <form method="POST" action="{{ route('teams.notes.update', [$team, $note]) }}">
        @csrf
        @method('PUT')
        <input name="title" value="{{ $note->title }}" required>
        <textarea name="content" required>{{ $note->content }}</textarea>
        <button type="submit">Update</button>
    </form>

</div>
