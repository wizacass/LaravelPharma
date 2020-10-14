@extends('layouts/main')

@section('content')
    <x-hero>
        Medicaments
    </x-hero>

    <div class="container" style="margin-top: 1em">

        @if ($medicaments->count() > 0)
        <table class="table is-striped" style="margin: auto">
            <x-tablecaption title="All available medicaments"/>
            <thead>
                <th>ID</th>
                <th>Title</th>
                <th>Active Substance</th>
                <th>BAR Code</th>
                <th>Price</th>
                <th><abbr title="Requires a recipe">Rec.</abbr></th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($medicaments as $medicament)
                    <tr>
                        <td> {{ $medicament->id }} </td>
                        <td> {{ $medicament->name }} </td>
                        <td> {{ $medicament->active_substance }} </td>
                        <td> {{ $medicament->bar_code }} </td>
                        <td style="text-align: right"> {{ $medicament->price }}$ </td>
                        <td class="has-text-centered"> 
                            @if ($medicament->recipe_required)
                            <span class="icon">
                                <i class="fas fa-lg fa-file-prescription"></i>
                            </span>
                            @endif
                         </td>
                        <td>
                            <x-editdelete href="/medicaments/{{ $medicament->id }}" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>     
        @else
        <div class="container has-text-centered" style="padding: 2em">
            <p class="subtitle">No medicaments are available!</p>
        </div>
        @endif

       <x-largebutton href="/medicaments/create">Add new medicament</x-largebutton>
    </div>
@endsection
