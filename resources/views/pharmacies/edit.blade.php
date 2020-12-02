@extends('layouts/main')

@section('content')
    <x-hero color="is-primary">
        Edit Pharmacy information
    </x-hero>

    <div class="container" style="padding: 1em">
        <form method="POST" action="/pharmacies/{{ $pharmacy->id }}">
            @csrf
            @method('PATCH')

            <x-formerror />

            <x-inlineinput label="Address" for="address" value="{{ $pharmacy->address }}"/>
            <x-inlineinput label="Phone Number" for="phone_number" value="{{ $pharmacy->phone_number }}"/>
            <x-inlinecheckbox label="Is Manufacturing" for="is_manufacturing" checked="{{ $pharmacy->is_manufacturing }}"/>
            <x-inlineinput label="Employee capacity" for="max_employees" type="number" value="{{ $pharmacy->max_employees }}"/>

            <div class="field has-text-centered">
                <button class="button is-primary is-large" type="submit">Update</button>
            </div>
        </form>
    </div>
@endsection
