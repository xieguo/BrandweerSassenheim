<div class="form-group">
    <label for="title">Titel</label>
    <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') ?: $article->title }}" required autofocus>

    @if ($errors->has('title'))
        <div class="invalid-feedback">
            {{ $errors->first('title') }}
        </div>
    @endif
</div>

<div class="form-group">
    <label for="type">Type</label>
    <select id="type" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type">
        @foreach (config('types') as $key => $type)
            <option value="{{ $key }}"{{ old('type') ?: $article->type == $key ? ' selected' : '' }}>
                {{ $key }}
            </option>
        @endforeach
    </select>

    @if ($errors->has('type'))
        <div class="invalid-feedback">
            {{ $errors->first('type') }}
        </div>
    @endif
</div>

<div class="form-group">
    <label for="image">Afbeelding</label>
    <input id="image" type="file" class="form-control-file{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image">

    @if ($errors->has('image'))
        <div class="invalid-feedback">
            {{ $errors->first('image') }}
        </div>
    @endif
</div>

<div class="form-group">
    <label for="introduction">Korte introductie</label>
    <textarea id="introduction" class="form-control{{ $errors->has('introduction') ? ' is-invalid' : '' }}" name="introduction" rows="3">{{ old('introduction') ?: $article->introduction }}</textarea>

    @if ($errors->has('introduction'))
        <div class="invalid-feedback">
            {{ $errors->first('introduction') }}
        </div>
    @endif
</div>

<div class="form-group">
    <label for="description">Beschrijving</label>
    <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="8">{{ old('description') ?: $article->description }}</textarea>

    @if ($errors->has('description'))
        <div class="invalid-feedback">
            {{ $errors->first('description') }}
        </div>
    @endif
</div>

<div class="form-group">
    <div class="checkbox">
        <label>
            <input type="checkbox" name="is_frontpage" {{ (old('is_frontpage') ?: $article->is_frontpage) ? 'checked' : '' }}> Toon op de homepage
        </label>
    </div>
    <div class="checkbox">
        <label>
            <input type="checkbox" name="is_hidden" {{ (old('is_hidden') ?: $article->is_hidden) ? 'checked' : '' }}> Verberg dit artikel
        </label>
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">Opslaan</button>
</div>
