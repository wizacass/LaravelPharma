@extends('layouts/main')

@section('content')
    <x-hero subtitle="{{ $pharmacy->address }}" color="is-primary">
        Pharmacy no. {{ $pharmacy->id }}
    </x-hero>

    <div class="container" style="margin-top: 2em">
        <div class="columns">
            <div class="column is-one-third">
                <div class="card">
                    <header class="card-header">
                        <h3 class="card-header-title is-centered">
                            Pharmacy information
                        </h3>
                    </header>
                    <div class="card-content">
                        <table class="table is-fullwidth">
                            <tbody>
                                <tr>
                                    <th>Address</th>
                                    <td style="text-align: right">{{ $pharmacy->address }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td style="text-align: right">{{ $pharmacy->phone_number }}</td>
                                </tr>
                                <tr>
                                    <th>Employees</th>
                                    <td style="text-align: right">
                                        <p class="{{ $pharmacy->isFull() ? 'has-text-danger' : '' }}">
                                            {{ $pharmacy->employees->count() }}/{{ $pharmacy->max_employees }}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Revenue</th>
                                    <td style="text-align: right">{{ $pharmacy->revenue }}$</td>
                                </tr>
                                <tr>
                                    <th>Total cash</th>
                                    <td style="text-align: right">{{ $pharmacy->cash() }}$</td>
                                </tr>
                                <tr>
                                    <th colspan="2" class="has-text-centered">
                                        <div class="level">
                                            <div class="level-left">
                                                <div class="level-item">
                                                    <p>Manufacturing Pharmacy</p>
                                                </div>
                                            </div>
                                            <div class="level-right">
                                                <div class="level-item">
                                                    @if ($pharmacy->is_manufacturing)
                                                        <span class="icon has-text-success">
                                                            <i class="fas fa-lg fa-check"></i>
                                                        </span>
                                                    @else
                                                        <span class="icon has-text-danger">
                                                            <i class="fas fa-lg fa-times"></i>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <footer class="card-footer">
                        <p class="card-footer-item">
                            <span>
                                <a href="/pharmacies/{{ $pharmacy->id }}/edit">Edit Information</a>
                            </span>
                        </p>
                        <p class="card-footer-item">
                            <span>
                                <a href="#">Add an employee</a>
                            </span>
                        </p>
                    </footer>
                </div>
                <div class="card" style="margin-top: 2em">
                    <header class="card-header">
                        <h4 class="card-header-title is-centered">
                            Registers
                        </h4>
                    </header>
                    <div class="card-content">
                        <table class="table is-fullwidth">
                            <tbody>
                                @foreach ($pharmacy->registers as $register)
                                    <tr>
                                        <th>{{ $register->model->model }}</th>
                                        <td style="text-align: right">{{ $register->cash }}$</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <footer class="card-footer">
                        <p class="card-footer-item">
                            <span>
                                <a href="#">Add a new register</a>
                            </span>
                        </p>
                    </footer>
                </div>
                <div class="container has-text-centered" style="padding: 2em">
                    <a class="button is-danger is-large" href="#">Delete Pharmacy</a>
                    {{-- <form method="POST" action="/pharmacies/{{ $pharmacy->id }}">
                        @csrf
                        @method('DELETE')
                        <button class="button is-danger is-large" type="submit">Delete Pharmacy</button>
                    </form> --}}
                </div>
            </div>
            <div class="column">
                <table class="table is-striped is-fullwidth">
                    <x-tablecaption title="Employees"/>
                    <thead>
                        <th>Name</th>
                        <th><abbr title="Position">Pos.</abbr></th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($pharmacy->employees as $employee)
                            <tr>
                                <td>{{ $employee->name }} {{ $employee->surname }}</td>
                                <td>{{ $employee->position->title ?? "Pharmacy worker" }}</td>
                                <td>
                                    <a class="button is-small is-outlined is-danger" href="#">Unassign</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
