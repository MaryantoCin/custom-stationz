<div class="col-md-2">
    <ul class="nav nav-pills flex-column">
        {{-- <li class="nav-item">
            <a class="nav-link text-dark" aria-current="page" href="#">Admin Account</a>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link text-dark" aria-current="page" href="{{ route('admin_view_product') }}">Product</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark" href="{{ route('admin_view_transaction') }}">Transaction</a>
        </li>
        <li class="nav-item">
        <li class="nav-item">
            <a class="nav-link text-dark" href="{{ route('admin_view_payment') }}">Payment Confirmation</a>
        </li>
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
