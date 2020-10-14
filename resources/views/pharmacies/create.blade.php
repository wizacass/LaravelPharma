@extends('layouts/main')

@section('content')
    <x-hero>
        Register a new Pharmacy
    </x-hero>

    <div class="container" style="padding: 1em">
        <form method="POST" action="/employees">
            @csrf

            <x-formerror />
            
            <x-inlineinput label="Address" for="address" />
            <x-inlineinput label="Phone Number" for="phone_number" />
            <x-inlinecheckbox label="Is Manufacturing" for="is_manufacturing" />
            <x-inlineinput label="Capacity" for="max_employees" type="number" />
            
            <div class="field has-text-centered">
                <button class="button is-success is-large" type="submit">Register</button>
            </div>
        </form>
    </div>
@endsection
