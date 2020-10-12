@extends('layouts/main')

@section('content')
    <x-hero color="is-success">
        Employees
    </x-hero>

    <div class="container" style="margin-top: 1em">

        <table class="table is-striped" style="margin: auto">
            <caption>
                <p class="subtitle">All employees</p>
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
                            <div class="field is-grouped">
                                <div class="control">
                                    <a class="button is-success is-small is-outlined" href="/employees/{{ $employee->id }}/edit">Edit</a>
                                </div>
                                <div class="control">
                                    <form method="POST" action="/employees/{{ $employee->id }}">
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

        <div class="field has-text-centered" style="padding: 1em">
            <a href="/employees/create" class="button is-success is-large">Register a new Employee</a>
        </div>
    </div>
@endsection
