<nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color: #30923A;">
            <!-- Navbar Brand-->
            <a class="navbar-brand m-4" href="{{route('dashboard')}}">
                <img src="{{url('assets/img/kpp-logo.png')}}" alt="" style="width: 60px; margin-right: 10px;">
                <span style="vertical-align: middle;">S P U T</span>
            </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            
            <!-- Navbar-->
            <ul class="navbar-nav justify-content-end flex-grow-1">

            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-bell fa-fw"></i>
                        <span class="badge rounded-pill badge-notification bg-danger">{{ auth()->user()->unreadNotifications->count() }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    @foreach (auth()->user()->unreadNotifications as $notification)
                        <li>
                            <a href="{{url($notification->data['url'].'?id='.$notification->id)}}" class="top-text-block">
                                <div class="top-text-heading font-monospace">{{ $notification->data['title'] }}</div>
                                <div class="top-text-light text-break">{{ $notification->data['messages'] }}</div>
                                <small class="text-muted text-wrap">
                                    {{$notification->created_at->diffForHumans()}}
                                </small>
                            </a> 
                        </li>
                    @endforeach
                    @foreach (auth()->user()->readNotifications as $notification)
                        <li>
                            <a href="{{url($notification->data['url'].'?id='.$notification->id)}}" class="top-text-block">
                                <p class="top-text-heading font-monospace">{{ $notification->data['title'] }}</div>
                                <div class="top-text-light">{{ $notification->data['messages'] }}</div>
                                <small class="text-muted">
                                    {{$notification->created_at->diffForHumans()}}
                                </small>
                            </a> 
                        </li>
                    @endforeach
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i>
                    
                    </a>
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
        