@extends('layouts/main')

@section('content')
    <section class="hero is-warning is-bold">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title">
                    Positions
                </h1>
            </div>
        </div>
    </section>

    <div class="container" style="margin-top: 1em">

        <table class="table is-striped" style="margin: auto">
            <caption>
                <p class="subtitle">All available positions</p>
            </caption>
            <thead>
                <th>Title</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($positions as $position)
                    <tr>
                        <td>{{ $position->title }}</td>
                        <td>
                            <div class="field is-grouped">
                                <div class="control">
                                    <a class="button is-warning is-small" href="/positions/{{ $position->id }}/edit">Edit</a>
                                </div>
                                <div class="control">
                                    <form method="POST" action="/positions/{{ $position->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="button is-dark is-small is-outlined" type="submit">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <br />
        <div class="field has-text-centered">
            <a href="/positions/create" class="button is-warning is-large">Register a new Position</a>
        </div>
        <br />
    </div>
@endsection
