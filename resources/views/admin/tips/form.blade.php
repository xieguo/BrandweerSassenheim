<div class="form-group">
    <label for="description">Tip</label>
    <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="3">{{ old('description') ?: $tip->description }}</textarea>

    @if ($errors->has('description'))
        <div class="invalid-feedback">
            {{ $errors->first('description') }}
        </div>
    @endif
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">Opslaan</button>
</div>
