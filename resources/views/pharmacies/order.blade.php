@extends('layouts/main')

@section('content')
    <x-hero color="is-primary">
        Create a new Order
    </x-hero>

    <div class="container" style="margin-top: 1em">
        <form method="POST" id="orderForm" action="/pharmacies/{{ $id }}/order">
            @csrf
            <x-formerror />

            <div class="container has-text-centered" style="padding-bottom: 1em">
                <a class="button is-link is-inverted" v-on:click="add">
                    <span class="icon is-small">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span>Add a new product</span>
                </a>
                <a class="button is-danger is-inverted" v-on:click="remove" v-if="count > 0">
                    <span class="icon is-small">
                        <i class="fas fa-minus"></i>
                    </span>
                    <span>Remove</span>
                </a>
            </div>

            <div class="box" v-if="count > 0">
                <div class="level" v-for="i in count">
                    <div class="level-item">
                        <p><b>@{{ i }}</b></p>
                    </div>
                    <div class="level-item">
                        <div class="select is-fullwidth">
                            <select name=goods[]>
                                <option>Select a product</option>
                                @foreach ($medicaments as $product)
                                    <option value="{{ $product->id }}">
                                       {{ $product->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="level-item">
                        <x-inlineinput for="amounts[]" type="number" placeholder="Amount" />
                    </div>
                </div>
            </div>

            <div class="field has-text-centered">
                <button class="button is-primary is-large" type="submit">Order</button>
            </div>
        </form>
    </div>
@endsection
