@extends('layouts/main')

@section('content')
    <x-hero>
        Employees
    </x-hero>

    <div class="container" style="margin-top: 1em">

        <table class="table is-striped" style="margin: auto">
            <caption>
                <p class="subtitle">{{ $label }}</p>
            </caption>
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
                        <td>{{ $employee->position->title ?? "Pharmcist" }}</td>
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

        <x-largebutton href="employees/create">
            Register a new employee
        </x-largebutton>
    </div>
@endsection
