<nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color: #30923A;">
            <!-- Navbar Brand-->
            <a class="navbar-brand m-4" href="index.html">
                <img src="{{url('assets/img/kpp-logo.png')}}" alt="" style="width: 60px; margin-right: 10px;">
                <span style="vertical-align: middle;">S P U T</span>
            </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        
            <!-- Navbar-->
            <ul class="navbar-nav justify-content-end flex-grow-1">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><div class="dropdown-item">{{ Auth::user()->name }}</div></li>
                        <li>
                            <li><a class="dropdown-item" href="{{route('profile.edit')}}">Profile</a></li>
                        </li>
                        <li><hr class="dropdown-divider" /></li>

                        <li>
                            <form action="{{url('logout')}}" method="POST">
                                @csrf
                                <button class="nav-link text-white ms-2 btn btn-danger" type="submit">
                                    Keluar
                                </button>
                            </form>
                        </li>
                        
                    </ul>
                </li>
            </ul>
        </nav>