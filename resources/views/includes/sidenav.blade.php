<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion bg-success text-white" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link text-white" href="{{route('dashboard')}}">
                <div class="sb-nav-link-icon"><i class="fas fa-home-alt"></i></div>
                Dashboard
                </a>
                <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                MoM
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link text-white" href="{{route('MoM1')}}">MoM 1 : Daily Meeting Lv 1</a>
                    <a class="nav-link text-white" href="layout-sidenav-light.html">MoM 2 : Daily Meeting Lv 2</a>
                    <a class="nav-link text-white" href="layout-sidenav-light.html">MoM 3 : Meeting Koordinasi</a>
                </nav>
                </div>
                @role('ADMIN')
                <a class="nav-link text-white" href="{{route('pengaturanAkun.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                    Pengaturan Akun
                </a>
                @endrole
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <h3>{{ Auth::user()->roles->map->name->implode(', ') }}</h3>
        </div>
    </nav>
</div>