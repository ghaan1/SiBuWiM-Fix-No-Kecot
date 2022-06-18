    <div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('templates/dashboard')}}/img/sidebar-3.jpg">
        <div class="logo"><a href="{{route('beranda')}}" class="simple-text logo-normal">
                SiBuWim
            </a></div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                @if(Auth::user()->role == 'Admin')
                <li class="nav-item {{Request::segment(1) == 'dashboard' ? 'active' : ''}}">
                    <a class="nav-link" href="{{route('dashboard.index')}}">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @endif
                <li class="nav-item ">
                    <a class="nav-link" target="_blank" href="{{route('beranda')}}">
                        <i class="material-icons">home</i>
                        <p>Halaman Utama</p>
                    </a>
                </li>
                <li class="nav-item {{Request::segment(1) == 'profil' ? 'active' : ''}}">
                    <a class="nav-link" href="{{route('user.profil')}}">
                        <i class="material-icons">person</i>
                        <p>Data Profil</p>
                    </a>
                </li>
                @if(Auth::user()->role == 'Admin')
                <li class="nav-item {{Request::segment(1) == 'user' ? 'active' : ''}}">
                    <a class="nav-link" href="{{route('user.index')}}">
                        <i class="material-icons">people</i>
                        <p>Data User</p>
                    </a>
                </li>
                @endif
                @if(Auth::user()->role == 'Manager')
                <li class="nav-item {{Request::segment(1) == 'kategori' ? 'active' : ''}}">
                    <a class="nav-link" href="{{route('kategori.index')}}">
                        <i class="material-icons">category</i>
                        <p>Data PO</p>
                    </a>
                </li>
                @endif
                @if(Auth::user()->role == 'PO')
                <li class="nav-item {{Request::segment(1) == 'armada' ? 'active' : ''}}">
                    <a class="nav-link" href="{{route('armada.index')}}">
                        <i class="material-icons">bus_alert</i>
                        <p>Data Armada</p>
                    </a>
                </li>
                @endif
                @if(Auth::user()->role == 'Admin')
                <li class="nav-item {{Request::segment(1) == 'produk' ? 'active' : ''}}">
                    <a class="nav-link" href="{{route('produk.index')}}">
                        <i class="material-icons">inventory_2</i>
                        <p>Data Jadwal</p>
                    </a>
                </li>
                <li class="nav-item {{Request::segment(1) == 'transaksi' ? 'active' : ''}}">
                    <a class="nav-link" href="{{route('transaksi.index')}}">
                        <i class="material-icons">
                            History
                        </i>
                        <p>Data Transaksi</p>
                    </a>
                </li>
                @endif
                @if(Auth::user()->role == 'Manager')
                <li class="nav-item {{Request::segment(1) == 'halte' ? 'active' : ''}}">
                    <a class="nav-link" href="{{route('halte.index')}}">
                        <i class="material-icons">directions_bus</i>
                        <p>Data Halte</p>
                    </a>
                </li>
                <li class="nav-item {{Request::segment(1) == 'komplain' ? 'active' : ''}}">
                    <a class="nav-link" href="{{route('komplain.index')}}">
                        <i class="material-icons">receipt</i>
                        <p>Data Komplain</p>
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
