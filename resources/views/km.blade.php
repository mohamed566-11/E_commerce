not admin
<div class="btn-group mb-1" >
    <a class="dropdown-item " href="{{ route('logout') }}" style="color: red"
    onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>
    <div class="dropdown-menu">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</div>
