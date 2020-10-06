@extends('layouts/nomenu')

@section('content')
    <section class="hero is-primary is-info is-medium is-bold">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title">
                    L2. Laravel Integration
                </h1>
                <h2 class="subtitle">
                    Vytenis Petrauskas IFF-8/1
                </h2>
            </div>
        </div>
    </section>

    <div class="tile is-ancestor has-text-centered" style="margin:1em">
        <div class="tile is-vertical is-parent">
            <div class="tile is-child">
                <article class="tile is-child notification is-info">
                    <a class="title" href="pharmacies.html">Pharmacies</a>
                </article>
            </div>
            <div class="tile is-child">
                <article class="tile is-child notification is-info">
                    <a class="title" href="medicaments.html">Medicaments</a>
                </article>
            </div>
        </div>
        <div class="tile is-vertical is-parent">
            <div class="tile is-child">
                <article class="tile is-child notification is-info">
                    <a class="title" href="employees.html">Employees</a>
                </article>
            </div>
            <div class="tile is-child">
                <article class="tile is-child notification is-info">
                    <a class="title" href="positions.html">Positions</a>
                </article>
            </div>
        </div>
    </div>
@endsection
