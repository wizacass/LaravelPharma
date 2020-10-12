<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label class="label" for="{{ $for }}">{{ $label }}</label>
    </div>
    <div class="field-body">
        <div class="field">
            <p class="control">
                <input class="input" class="input {{ $errors->has($for) ? 'is-danger' : '' }}" name={{ $for }}
                value="{{ old($for) }}" type="text" required>
            </p>
        </div>
    </div>
</div>
