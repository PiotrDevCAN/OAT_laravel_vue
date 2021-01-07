<nav class="bx--breadcrumb" aria-label="breadcrumb">
    <div class="bx--breadcrumb-item">
        <a href="#" class="bx--link">Home</a>
    </div>
    @foreach ($breadcrumbs as $key => $value)
        <div class="bx--breadcrumb-item">
            <a href="#" class="bx--link">{{ Str::ucfirst($value) }}</a>
        </div>
    @endforeach
</nav>