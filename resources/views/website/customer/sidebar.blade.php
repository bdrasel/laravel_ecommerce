 <ul class="list-group">
    <li class="list-group-item {{ request()->is('customer') ? 'active':'' }} "><a href="{{ url('customer') }}">Dashboard</a></li>
    <li class="list-group-item {{ request()->is('customer/orders/*') ? 'active':'' }} "><a href="{{ url('customer/orders') }}">Orders</a></li>
    <li class="list-group-item {{ request()->is('customer/profile') ? 'active':'' }} "><a href="{{ url('customer/orders') }} "><a href="{{ url('customer/profile') }}">Profile</a></li>
    <li class="list-group-item"><a href="{{ url('customer/setting') }}">Setting</a></li>
    <li class="list-group-item"><a href="{{ url('customer/logout') }}">Logout</a></li>
</ul>
