
<div class="row">
    <div class="card">
    <div class="card-header">

        <h4 class="card-title breadcrumb-card-head transform-me">{{ collect(request()->segments())->last() }}</h4>
    </div>
    <div class="card-body">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <?php $segments = ''; ?>
                <li class="breadcrumb-item"><a class="transform-me" href="{{ route('dashboard') }}">AMS</a></li>
                @foreach (Request::segments() as $segment)
                    <?php $segments .= '/' . $segment; ?>
                    <li class="breadcrumb-item"><a class="transform-me" href="{{ $segments }}">{{ $segment }}</a></li>
                @endforeach
            </ol>
        </nav>
    </div>
</div>
</div>