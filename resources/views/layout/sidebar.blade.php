<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        @if (Auth::guard('user')->user()->role === 'admin')
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ url('/buku') }}">
                    <i class="bi bi-bookshelf"></i>
                    <span>Daftar Buku</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ url('/buku') }}">
                    <i class="bi bi-file-earmark-check"></i>
                    <span>Laporan Buku</span>
                </a>
            </li>
        @elseif(Auth::guard('user')->user()->role === 'penulis')
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ url('/my-buku') }}">
                    <i class="bi bi-bookshelf"></i>
                    <span>Buku Saya</span>
                </a>
            </li>
        @endif
    </ul>

</aside>
