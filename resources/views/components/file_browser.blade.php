<div class="bg-light p-4">
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Afbeelding uploaden</h5>
            <form method="POST" action="{{ route('admin.file.store', ['type' => $type, 'id' => $entity->id]) }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input id="image" type="file" class="custom-file-input{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image">
                        <input type="file" class="custom-file-input" id="inputGroupFile02">
                        <label class="custom-file-label" for="inputGroupFile02">Kies een afbeelding</label>
                    </div>
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text bg-success text-white">Uploaden</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        @foreach ($entity->files as $file)
            <div class="col-md-6">
                <div class="card mb-4">
                    <img class="card-img-top" src="{{ $file->path }}" alt="" width="250">
                    <div class="card-body">
                        <div class="card-link">
                            <div class="btn-group btn-block">
                                <form method="POST" action="{{ route('admin.file.destroy', $file->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger">Verwijderen</button>
                                </form>
                                <button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <form method="POST" action="{{ route('admin.file.update', [$file->id, 'type' => $type, 'id' => $entity->id]) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <button type="submit" class="dropdown-item btn">Hoofdfoto</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach()
    </div>
</div>
