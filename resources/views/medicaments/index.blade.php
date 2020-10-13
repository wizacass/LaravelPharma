@extends('layouts/main')

@section('content')
    <x-hero>
        Medicaments
    </x-hero>

    <div class="container" style="margin-top: 1em">

        <table class="table is-striped" style="margin: auto">
            <caption>
                <p class="subtitle">All available medicaments</p>
            </caption>
            <thead>
                <th>ID</th>
                <th>Title</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($medicaments as $medicament)
                    <tr>
                        <td> {{ $medicament->id }} </td>
                        <td> {{ $medicament->name }} </td>
                        <td>
                            <x-editdelete href="/medicaments/{{ $medicament->id }}" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

       <x-largebutton href="/medicaments/create">Add new medicament</x-largebutton>
    </div>
@endsection
