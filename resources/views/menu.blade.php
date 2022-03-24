<nav class="navbar navbar-expand-lg navbar-dark navbar-full" style="background-color: #7D7D7D">
<img src="https://img.icons8.com/external-wanicon-lineal-color-wanicon/64/000000/external-book-library-wanicon-lineal-color-wanicon-3.png" />
  <a class="navText" href="/">Book Exchange</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
  <div class="navRight">
    <div class="navbar-nav">
        @if (Route::has('login'))
            @auth
            <a class="nav-item nav-link navRight" href="/home">My books</a>
            <a class="nav-item nav-link navRight" href="/books">Book World</a>
            <a class="nav-item nav-link navRight" href="/exchange_notifications">Notifications:</a>
            <a style="background-color:gray; border:1px solid black; border-radius:70%; color:white;">@include('unread')</a>
                <a class="nav-item nav-link navRight" style="margin-left:30px;" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        @else
      <a class="nav-item nav-link navRight" href="/register">Register </a>
      <a class="nav-item nav-link navRight" href="/login">Login</a>
            @endauth
        @endif
    </div>
</div>
  </div>
</nav>


