<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label class="label" for="{{ $for }}">{{ $label }}</label>
    </div>
    <div class="field-body">
        <div class="field">
            <div class="select is-fullwidth {{ $errors->has($for) ? 'is-danger' : '' }}">
                <select name="{{ $for }}">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
            </div>
        </div>
    </div>
</div>
