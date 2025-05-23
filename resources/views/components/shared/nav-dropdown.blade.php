<li class="nav-item">
    <a class="nav-link menu-arrow" href="#{{ $id }}" data-bs-toggle="collapse" role="button"
        aria-expanded="false" aria-controls="{{ $id }}">
        <span class="nav-icon">
            <iconify-icon icon="{{ $icon }}"></iconify-icon>
        </span>
        <span class="nav-text">{{ $title }}</span>
    </a>
    <div class="collapse" id="{{ $id }}">
        <ul class="nav sub-navbar-nav">
            @foreach ($submenu as $item)
                <li class="sub-nav-item">
                    <a class="sub-nav-link" href="{{ route($item['route']) }}">{{ $item['title'] }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</li>
