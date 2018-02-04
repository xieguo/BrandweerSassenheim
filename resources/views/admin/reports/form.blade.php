<div class="form-group">
    <label for="title">Titel</label>
    <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') ?: $report->title }}" required autofocus>

    @if ($errors->has('title'))
        <div class="invalid-feedback">
            {{ $errors->first('title') }}
        </div>
    @endif
</div>
<div class="form-row">
    <div class="col-md-4 mb-3">
        <label for="date">Datum</label>
        <input type="date" name="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" id="date" value="{{ old('date') ?: $report->report_at->format('Y-m-d') }}" required>

        @if ($errors->has('date'))
            <div class="invalid-feedback">
                {{ $errors->first('date') }}
            </div>
        @endif
    </div>
    <div class="col-md-4 mb-3">
        <label for="time">Tijd</label>
        <input type="time" name="time" class="form-control{{ $errors->has('time') ? ' is-invalid' : '' }}" id="time" value="{{ old('time') ?: $report->report_at->format('H:i') }}" required>

        @if ($errors->has('time'))
            <div class="invalid-feedback">
                {{ $errors->first('time') }}
            </div>
        @endif
    </div>
</div>

<div class="form-group">
    <label for="address">Adres</label>
    <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') ?: $report->address }}">

    @if ($errors->has('address'))
        <div class="invalid-feedback">
            {{ $errors->first('address') }}
        </div>
    @endif
</div>

<div class="form-group">
    <label for="city">Plaatsnaam</label>
    <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') ?: $report->city }}">

    @if ($errors->has('city'))
        <div class="invalid-feedback">
            {{ $errors->first('city') }}
        </div>
    @endif
</div>

<div class="form-group">
    <label for="type">Soort melding</label>
    <input id="type" type="text" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" value="{{ old('type') ?: $report->type }}">
    <small class="form-text text-muted">Bijvoorbeeld Autobrand</small>

    @if ($errors->has('type'))
        <div class="invalid-feedback">
            {{ $errors->first('type') }}
        </div>
    @endif
</div>

<div class="form-group">
    <label for="description">Beschrijving</label>
    <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="8">{{ old('description') ?: $report->description }}</textarea>

    @if ($errors->has('description'))
        <div class="invalid-feedback">
            {{ $errors->first('description') }}
        </div>
    @endif
</div>

<div class="form-group">
    <div class="checkbox">
        <label>
            <input type="checkbox" name="remember" {{ (old('is_hidden') ?: $report->is_hidden) ? 'checked' : '' }}> Verberg deze melding
        </label>
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">Opslaan</button>
</div>
