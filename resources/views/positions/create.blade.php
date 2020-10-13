@extends('layouts/main')

@section('content')
    <x-hero color="is-warning">
        Create a new position
    </x-hero>

    <div class="container" style="padding: 1em">
        <form method="POST" action="/positions">
            @csrf

            <x-formerror />
            
            <x-inlineinput label="Title" for="title" />
            
            <div class="field has-text-centered">
                <button class="button is-success is-large" type="submit">Create</button>
            </div>
        </form>
    </div>
@endsection
