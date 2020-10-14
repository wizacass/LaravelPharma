@extends('layouts/main')

@section('content')
    <x-hero>
        Positions
    </x-hero>

    <div class="container" style="margin-top: 1em">

        @if ($positions->count() > 0)
        <table class="table is-striped" style="margin: auto">
            <x-tablecaption title="All available positions"/>
            <thead>
                <th>Title</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($positions as $position)
                    <tr>
                        <td>
                            <a href="/positions/{{ $position->id }}">
                                {{ $position->title }}
                            </a>
                        </td>
                        <td>
                            <x-editdelete href="/positions/{{ $position->id }}" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="container has-text-centered" style="padding: 2em">
            <p class="subtitle">No positions are defined!</p>
        </div>
        @endif

       <x-largebutton href="/positions/create">Add new position</x-largebutton>
    </div>
@endsection
