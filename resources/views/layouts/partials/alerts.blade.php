@if (session('success'))
    <div class="row">
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    </div>
@endif

@if (session('info'))
    <div class="row">
        <div class="alert alert-info">
            {{ session('info') }}
        </div>
    </div>
@endif

@if (session('warning'))
    <div class="row">
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    </div>
@endif

@if (session('error'))
    <div class="row">
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    </div>
@endif
