@extends('layouts/main')

@section('content')
    <x-hero>
        Register a new Pharmacy
    </x-hero>

    <div class="container" style="padding: 1em">
        <form method="POST" action="/pharmacies">
            @csrf

            <x-formerror />

            <x-inlineinput label="Address" for="address" />
            <x-inlineinput label="Phone Number" for="phone_number" />
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label" for="model_id">Register type</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="select is-fullwidth {{ $errors->has('model_id') ? 'is-danger' : '' }}">
                            <select name="model_id">
                                @foreach ($models as $model)
                                    <option value="{{ $model->id }}">{{ $model->model }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <x-inlinecheckbox label="Is Manufacturing" for="is_manufacturing" />
            <x-inlineinput label="Capacity" for="max_employees" type="number" />

            <div class="field has-text-centered">
                <button class="button is-success is-large" type="submit">Register</button>
            </div>
        </form>
    </div>
@endsection
