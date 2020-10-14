@extends('layouts/main')

@section('content')
    <x-hero>
        Pharmacies
    </x-hero>

    <div class="container" style="margin-top: 1em">

        @if ($pharmacies->count() > 0)
        <table class="table is-striped" style="margin: auto">
            <x-tablecaption title="All pharmacies"/>
            <thead>
                <th>ID</th>
                <th>Address</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($pharmacies as $pharmacy)
                    <tr>
                        <td>{{ $pharmacy->id }}</td>
                        <td>{{ $pharmacy->address }}</td>
                        <td>
                            <x-editdelete href="/pharmacies/{{ $position->id }}" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="container has-text-centered" style="padding: 2em">
            <p class="subtitle">There are no pharmacies!</p>
        </div>
        @endif

       <x-largebutton href="/pharmacies/create">Register new pharmacy</x-largebutton>
    </div>
@endsection
