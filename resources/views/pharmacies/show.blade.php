@extends('layouts/main')

@section('content')
    <x-hero subtitle="{{ $pharmacy->address }}" color="is-primary">
        Pharmacy no. {{ $pharmacy->id }}
    </x-hero>

    <div class="container" style="margin-top: 2em">
        <div class="columns">
            <div class="column is-one-third" id="hasToggler">

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
                                {{-- <a href="/pharmacies/{{ $pharmacy->id }}/edit">Edit
                                    Information</a> --}}
                                <a href="#">Edit Information</a>
                            </span>
                        </p>
                        @if (!$pharmacy->isFull())
                            <p class="card-footer-item">
                                <span>
                                    <a v-on:click="toggle1">Add an employee</a>
                                </span>
                            </p>
                        @endif
                    </footer>
                </div>

                <div v-if="isShown1">
                    <form method="POST" action="/pharmacies/{{ $pharmacy->id }}/assign">
                        @csrf
                        <div class="card" style="margin-top: 2em">
                            <header class="card-header">
                                <h4 class="card-header-title is-centered">
                                    Select an employee
                                </h4>
                            </header>
                            <div class="card-content">
                                <div class="select is-fullwidth">
                                    <select name="employee">
                                        <option>Select an employee</option>
                                        @foreach ($availableEmployees as $employee)
                                            <option value="{{ $employee->id }}"> [{{ $employee->position->title }}]
                                                {{ $employee->name }}
                                                {{ $employee->surname }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <footer class="card-footer">
                                <p class="card-footer-item">
                                    <button class="button is-link is-inverted is-fullwidth" type="submit">Assign</button>
                                </p>
                            </footer>
                        </div>
                    </form>
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
                                        @if (count($pharmacy->registers) > 1)
                                            <td style="text-align: center">
                                                <form method="POST" action="/pharmacies/{{ $pharmacy->id }}/registers">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="register" value="{{ $register->id }}">
                                                    <button class="button is-danger is-small is-outlined" type="submit">Delete</button>
                                                </form>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <footer class="card-footer">
                        <p class="card-footer-item">
                            <span>
                                <a v-on:click="toggle2">Add a new register</a>
                            </span>
                        </p>
                    </footer>
                </div>

                <div v-if="isShown2">
                    <form method="POST" action="/pharmacies/{{ $pharmacy->id }}/registers">
                        @csrf
                        <div class="card" style="margin-top: 2em">
                            <header class="card-header">
                                <h4 class="card-header-title is-centered">
                                    Select a register
                                </h4>
                            </header>
                            <div class="card-content">
                                <div class="select is-fullwidth">
                                    <select name="model">
                                        @foreach ($registers as $register)
                                            <option value="{{ $register->id }}">
                                                {{ $register->model }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <footer class="card-footer">
                                <p class="card-footer-item">
                                    <button class="button is-link is-inverted is-fullwidth" type="submit">Add</button>
                                </p>
                            </footer>
                        </div>
                    </form>
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
                <div class="box">
                    @if ($pharmacy->isEmpty())
                        <div class="container has-text-centered">
                            <h4 class="subtitle">Please assign an employee to this pharmacy!</h4>
                        </div>
                    @else
                        <table class="table is-striped is-fullwidth">
                            <x-tablecaption title="Employees" />
                            <thead>
                                <th>Name</th>
                                <th>Position</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($pharmacy->employees as $employee)
                                    <tr>
                                        <td>{{ $employee->name }} {{ $employee->surname }}</td>
                                        <td>{{ $employee->position->title ?? 'Pharmacy worker' }}</td>
                                        <td>
                                            <form method="POST" action="/pharmacies/{{ $pharmacy->id }}/assign">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="employee" value="{{ $employee->id }}">
                                                <button class="button is-small is-outlined is-danger"
                                                    type="submit">Unassign</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
                @if ($pharmacy->medicaments->count() == 0)
                    <div class="container has-text-centered">
                        <h4 class="subtitle">There are no medicaments in this pharmacy! Please order some!</h4>
                    </div>
                @else
                    <ul>
                        @foreach ($pharmacy->medicaments as $medicament)
                            <li>
                                <p>{{ $medicament->price }}</p>
                            </li>
                        @endforeach
                    </ul>
                @endif
                <div class="control has-text-centered" style="padding-top: 1em">
                    <a class="button is-primary" href="#">Order medicaments</a>
                </div>
            </div>
        </div>

    </div>
@endsection
