@extends('layouts/main')

@section('content')
    <x-hero color="is-success">
        Edit Employee
    </x-hero>

    <div class="container" style="padding: 1em">
        <form method="POST" action="/employees/{{ $employee->id }}">
            @csrf
            @method('PATCH')

            <x-formerror />

            <x-inlineinput label="Name" for="name" value="{{ $employee->name }}"/>
            <x-inlineinput label="Surname" for="surname" value="{{ $employee->surname }}" />

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label" for="position_id">Position</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="select is-fullwidth {{ $errors->has('position_id') ? 'is-danger' : '' }}">
                            <select name="position_id">
                                <option>Select a position</option>
                                @foreach ($positions as $position)
                                    <option value="{{ $position->id }}" {{ $position->id == $employee->position_id ? "selected" : ""}}>{{ $position->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="field has-text-centered">
                <button class="button is-success is-large" type="submit">Update</button>
            </div>
        </form>
    </div>
@endsection
