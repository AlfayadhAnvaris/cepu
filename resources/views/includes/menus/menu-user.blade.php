<li
    class="sidebar-item {{ request()->routeIs('user.index') ? 'active' : ''}} ">
    <a href="{{route('user.index')}}" class='sidebar-link'>
        <i class="bi bi-grid-fill"></i>
        <span>Dashboard</span>
    </a>
</li>

<li
    class="sidebar-item {{ request()->routeIs('user.form.complaint') ? 'active' : ''}} ">
    <a href="{{route('user.form.complaint') }}" class='sidebar-link'>
        <i class="bi bi-grid-fill"></i>
        <span>Ajukan Pengaduan</span>
    </a>
</li>
<li
    class="sidebar-item has-sub  {{ request()->routeIs('user.all.complaints')  || request()->routeIs('user.all.pending.complaints') ||request()->routeIs('user.all.process.complaints') || request()->routeIs('user.all.success.complaints') ? 'active' : ''}} ">
    <a href="" class='sidebar-link'>
        <i class="bi bi-chat-quote"></i>
        <span>Track Semua Pengaduan</span>
    </a>

    <ul class="submenu submenu-closed" style="--submenu-height: 215px;">
        <li class="submenu-item  {{ request()->routeIs('user.all.complaint') ? 'active' : ''}} " >
            <a href="{{route('user.all.complaints')}}">Semua Pengaduan</a>
        </li>
        <li class="submenu-item   {{ request()->routeIs('user.pending.complaint') ? 'active' : ''}} ">
            <a href="{{route('user.pending.complaints')}}" class="submenu-link" class="submenu-link">Pending</a>
        </li>
        <li class="submenu-item  {{ request()->routeIs('user.process.complaint') ? 'active' : ''}} ">
            <a href="{{route('user.process.complaints')}}" class="submenu-link" class="submenu-link">Proses</a>
        </li>
        <li class="submenu-item  {{ request()->routeIs('user.success.complaint') ? 'active' : ''}} ">
            <a href="{{route('user.success.complaints')}}" class="submenu-link" class="submenu-link">Selesai</a>
        </li>
    </ul>
</li>