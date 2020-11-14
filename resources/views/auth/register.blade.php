@extends('layouts/main')

@section('content')
    <x-hero>Register</x-hero>
    <div class="container" style="padding: 1em">
        <div class="container has-text-centered" style="margin-bottom: 1em">
            <h2 class="subtitle">Please enter your details</h2>
        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <x-formerror />
            <x-inlineinput label="Username" for="name" />
            <x-inlineinput label="Email" for="email" type="email" />
            <x-inlineinput label="Password" for="password" type="password" />
            <x-inlineinput label="Confirm Password" for="password_confirmation" type="password" />

            <div class="field has-text-centered">
                <button class="button is-success" type="submit">Register</button>
            </div>
        </form>
    </div>
@endsection
