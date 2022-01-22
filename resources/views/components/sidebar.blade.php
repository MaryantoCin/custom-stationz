<div class="col-md-2">
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteNamed('view_profile') ? 'active' : 'text-dark' }}"
                aria-current="page" href="{{ route('view_profile') }}">My
                Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteNamed('view_address_book') ? 'active' : 'text-dark' }}"
                href="{{ route('view_address_book') }}">Address Book</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteNamed('view_transaction_history') ? 'active' : 'text-dark' }}"
                href="{{ route('view_transaction_history') }}">Transaction History</a>
        </li>
        <li class="nav-item">
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteNamed('view_payment_confirmation') ? 'active' : 'text-dark' }}"
                href="{{ route('view_payment_confirmation') }}">Payment Confirmation</a>
        </li>
        <li class="nav-item">
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteNamed('view_settings') ? 'active' : 'text-dark' }}"
                href="{{ route('view_settings') }}">Settings</a>
        </li>
        <li class="nav-item">
        <li class="nav-item">
            <a class="nav-link text-muted" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
        <li class="nav-item">
        </li>
    </ul>
</div>
