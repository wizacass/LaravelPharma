@extends('layouts/main')

@section('content')
    <x-hero>
        Employees
    </x-hero>

    <div class="container" style="margin-top: 1em">

        @if ($employees->count() > 0)
        <table class="table is-striped" style="margin: auto">
            <x-tablecaption title="{{ $label }}"/>
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th><abbr title="Position">Pos.</abbr></th>
                <th><abbr title="Pharmacy">Ph.</abbr></th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->name }} {{ $employee->surname }}</td>
                        <td>{{ $employee->position->title ?? "Pharmacy worker" }}</td>
                        <td>
                            @if ($employee->pharmacy_id != NULL)
                                <a href="/pharmacies/{{ $employee->pharmacy_id }}">No. {{ $employee->pharmacy_id }}</a>
                            @else
                                <i>n/a</i>
                            @endif
                        </td>
                        <td>
                            <x-editdelete href="/employees/{{ $employee->id }}" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="container has-text-centered" style="padding: 2em">
            <p class="subtitle">There are no employees!</p>
        </div>
        @endif

        <x-largebutton href="/employees/create">
            Register a new employee
        </x-largebutton>
    </div>
@endsection
