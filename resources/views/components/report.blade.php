<div class="card flex-md-row mb-4 box-shadow">
    <a href="{{ $report->path }}" class="card-link card-body d-flex flex-column align-items-start text-dark">
        <h5 class="mb-2">{{ $report->title }}</h5>
        <small class="mb-1 text-muted">{{ t($report->created_at->format('l j F Y')) }}</small>
        <p class="card-text">{{ str_limit($report->description, 120) }}</p>
    </a>
    @if ($report->files->count())
        <div class="d-none d-lg-block bg-dark bg-center bg-cover" style="min-width: 200px; background-image: url({{ $report->files[0]->path }});"></div>
    @endif
</div>
