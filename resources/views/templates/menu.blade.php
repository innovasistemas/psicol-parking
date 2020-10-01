<div class="links">
    @foreach ($menu as $key => $value)
        <a href="/{{ $key }}">{{ $value }}</a>
    @endforeach
</div>
