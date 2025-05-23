
<li class="nav-item {{ isActive($active ?? [$route]) }}">
    <a class="nav-link {{ isActive($active ?? [$route]) }}" href="{{ route($route) }}">
        <span class="nav-icon">
            <iconify-icon icon="{{ $icon }}"></iconify-icon>
        </span>
        <span class="nav-text">{{ $text }}</span>
    </a>
</li>
