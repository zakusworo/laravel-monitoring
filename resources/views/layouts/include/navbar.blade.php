@inject('mahasiswa', 'App\Models\Mahasiswa')
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="brand">
        <a href="/dashboard"><img src="{{asset('admin/assets/img/logo/Logo-utama-mini.png')}}" alt="PEP Bandung Logo" class="img-responsive logo" width="80%"></a>
    </div>
    <div class="container-fluid">
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
        </div>
        <div id="navbar-menu">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>{{auth()->user()->name}}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="/ganti-password"><i class="lnr lnr-cog"></i> <span>Ganti Password</span></a></li>
                        <li><a href="/logout" ><i class="lnr lnr-exit"></i> <span>Keluar</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
