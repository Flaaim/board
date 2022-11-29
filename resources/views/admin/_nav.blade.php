<ul class="nav nav-tabs mb-3">
    <li class="nav-item"><a href="{{route('admin.index')}}" class="nav-link {{Request::is('admin') ? 'active' : ''}} ">Dashboard</a></li>
    <li class="nav-item"><a href="{{route('users.index')}}" class="nav-link {{Request::is('admin/users') ? 'active' : ''}} ">Users</a></li>
    <li class="nav-item"><a href="{{route('roles.index')}}" class="nav-link {{Request::is('admin/roles') ? 'active' : ''}} ">Roles</a></li>
    <li class="nav-item"><a href="{{route('permissions.index')}}" class="nav-link {{Request::is('admin/permissions') ? 'active' : ''}} ">Permissions</a></li>
</ul>