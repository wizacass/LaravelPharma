<div class="field is-grouped">
    <div class="control">
        <a class="button is-success is-small is-outlined" href="{{ $href }}/edit">Edit</a>
    </div>
    <div class="control">
        <form method="POST" action="{{ $href }}">
            @csrf
            @method('DELETE')
            <button class="button is-dark is-small is-outlined" type="submit">Delete</button>
        </form>
    </div>
</div>
