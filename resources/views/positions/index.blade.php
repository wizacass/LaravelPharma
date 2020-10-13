@extends('layouts/main')

@section('content')
    <x-hero>
        Positions
    </x-hero>

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

       <x-largebutton href="/positions/create">Add new position</x-largebutton>
    </div>
@endsection
