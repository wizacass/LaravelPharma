@extends('layouts/main')

@section('content')
    <x-hero color="is-warning">
        Register a new medicament
    </x-hero>

    <div class="container" style="padding: 1em">
        <form method="POST" action="/medicaments">
            @csrf

            <x-formerror />
            
            <x-inlineinput label="Name" for="name" />
            <x-inlineinput label="Active Substance" for="active_substance" />
            <x-inlineinput label="BAR Code" for="bar_code" />
            <x-inlineinput label="Price, $" for="price" />
            
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label" for="recipe_required">Requires a recipe</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="select is-fullwidth {{ $errors->has('recipe_required') ? 'is-danger' : '' }}">
                            <select name="recipe_required">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="field has-text-centered">
                <button class="button is-success is-large" type="submit">Create</button>
            </div>
        </form>
    </div>
@endsection
