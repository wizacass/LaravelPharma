@extends('layouts/main')

@section('content')
    <x-hero color="is-warning">
        Create a new position
    </x-hero>

    <div class="container" style="padding: 1em">
        <form method="POST" action="/positions/{{ $position->id }}">
            @csrf
            @method('PATCH')

            <x-formerror />
            <div class="field">
                <label class="label" for="title">Title</label>
                <div class="control">
                    <input type="text" class="input {{ $errors->has('title') ? 'is-danger' : '' }}" name="title"
                        value="{{ $position->title }}" required>
                </div>
            </div>
            <div class="field has-text-centered">
                <button class="button is-warning is-large" type="submit">Update</button>
            </div>
        </form>
    </div>
@endsection
