<li
    class="sidebar-item {{ request()->routeIs ('admin.index') ? 'active' : ''}} ">
    <a href="{{route('admin.index')}}" class='sidebar-link'>
        <i class="bi bi-grid-fill"></i>
        <span>Dashboard</span>
    </a>
</li>

<li
    class="sidebar-item">
    <a href="index.html" class='sidebar-link'>
        <i class="bi bi-grid-fill"></i>
        <span>Lihat Pengaduan</span>
    </a>
</li>
<li
    class="sidebar-item {{ request()->routeIs ('admin.users.index') ? 'active' : ''}} ">

    <a href="{{ route ('admin.users.index')}}" class='sidebar-link'>
        <i class="bi bi-grid-fill"></i>
        <span>Master User</span>
    </a>
</li>