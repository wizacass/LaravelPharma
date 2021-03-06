@extends('layouts/nomenu')

@section('content')
    <x-hero subtitle="Vytenis Petrauskas IFF-8/1">
        L4. Laravel Forms
    </x-hero>
    
    @auth
    <div class="tile is-ancestor has-text-centered" style="margin:1em">
        <div class="tile is-vertical is-parent">
            <div class="tile is-child">
                <article class="tile is-child notification is-success">
                    <a class="title" href="/pharmacies">Pharmacies</a>
                </article>
            </div>
            <div class="tile is-child">
                <article class="tile is-child notification is-success">
                    <a class="title" href="/medicaments">Medicaments</a>
                </article>
            </div>
        </div>
        <div class="tile is-vertical is-parent">
            <div class="tile is-child">
                <article class="tile is-child notification is-success">
                    <a class="title" href="/employees">Employees</a>
                </article>
            </div>
            <div class="tile is-child">
                <article class="tile is-child notification is-success">
                    <a class="title" href="/positions">Positions</a>
                </article>
            </div>
        </div>
    </div>
    <div class="has-text-centered">
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="button is-success is-outlined is-large">Logout</button>
        </form>
    </div>
    @else
    <div class="tile is-ancestor has-text-centered" style="margin:1em">
        <div class="tile is-vertical is-parent">
            <div class="tile is-child">
                <article class="tile is-child notification is-success">
                    <a class="title" href="/register">Signup</a>
                </article>
            </div>
        </div>
        <div class="tile is-vertical is-parent">
            <div class="tile is-child">
                <article class="tile is-child notification is-success">
                    <a class="title" href="/login">Login</a>
                </article>
            </div>
        </div>
    </div>
    @endauth
@endsection
