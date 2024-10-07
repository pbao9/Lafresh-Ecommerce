<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center" style="width:350px">
        <h3 class="card-title">Thông báo</h3>
        <a href="{{ route('notification.index') }}" class="nav-link fs-4 small">Tất cả thông
            báo</a>
    </div>
    @if ($notify->isNotEmpty())
        <div class="list-group list-group-flush list-group-hoverable">
            @foreach ($notify->sortByDesc('created_at')->take(5) as $value)
                <div class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col text-truncate">
                            <a href="#" class="text-body d-block text-decoration-none">{{ $value->title }}</a>
                            <div class="d-block text-muted text-truncate mt-n1" style="max-width:350px">
                                {!! $value->desc !!}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    @else
        <p href="#" class="text-body d-block text-center my-3">Hiện không có thông báo</p>
    @endif
</div>
