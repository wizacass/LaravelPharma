@extends('layouts/main')

@section('content')
    <x-hero color="is-primary">
        Create a new Order
    </x-hero>

    <div class="container" id="orderForm" style="margin-top: 1em">
        <form method="POST" action="/pharmacies/{{ $id }}/order">
            @csrf
            <x-formerror />

            <orderinputs :products='@json($medicaments)'></orderinputs>

            <div class="field has-text-centered">
                <button class="button is-primary is-large" type="submit">Order</button>
            </div>
        </form>
    </div>
@endsection
