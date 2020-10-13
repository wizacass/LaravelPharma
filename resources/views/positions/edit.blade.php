@extends('layouts/main')

@section('content')
    <x-hero>
        Create a new position
    </x-hero>

    <div class="container" style="padding: 1em">
        <form method="POST" action="/positions/{{ $position->id }}">
            @csrf
            @method('PATCH')

            <x-formerror />

            <x-inlineinput label="Title" for="title" value="{{ $position->title }}" />

            <div class="field has-text-centered">
                <button class="button is-success is-large" type="submit">Update</button>
            </div>
        </form>
    </div>
@endsection
