 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <a href="{{url('/')}}" class="navbar-brand mx-3">
        <img src="{{url('frontend/images/Nomads Logo2x.png')}}" alt="Logo Nomads" />
    </a>
    <button class="navbar-toggler mx-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mx-3" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mr-3">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Paket Travel</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Services </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Testimonials</a>
        </li>
        </ul>
        @guest
            <!-- Mobile Button -->
            <form class="form-inline d-sm-block d-md-none">
                <button class="btn btn-login my-2 my-sm-0" type='button' onclick="event.preventDefault(); location.href='{{url('login')}}';">Masuk</button>
            </form>
            <!-- Desktop Button -->
            <form class="form-inline my-2 my-lg-0 d-none d-md-block mx-3">
                <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type='button' onclick="event.preventDefault(); location.href='{{url('login')}}';">Masuk</button>
            </form>
        @endguest
        @auth
            <!-- Mobile Button -->
            <form class="form-inline d-sm-block d-md-none" action="{{url('logout')}}" method="POST">
                @csrf
                <button class="btn btn-login my-2 my-sm-0" type="submit">Keluar</button>
            </form>
            <!-- Desktop Button -->
            <form class="form-inline my-2 my-lg-0 d-none d-md-block mx-3" action="{{url('logout')}}" method="POST">
                @csrf
                <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="submit">Keluar</button>
            </form>
        @endauth
        
    </div>
</nav>