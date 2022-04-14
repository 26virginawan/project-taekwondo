<ul class="nav">
    <li class="nav-item nav-profile">
        <div class="nav-link">
            <div class="user-wrapper">
                <div class="text-wrapper">
                    <p class="profile-name">{{Auth::user()->name}}</p>
                    <div>
                        <small class="designation text-muted"
                            style="text-transform: uppercase;letter-spacing: 1px;">{{ Auth::user()->level }}</small>
                        <span class="status-indicator online"></span>
                    </div>
                </div>
            </div>
        </div>
    </li>
    <li class="nav-item {{ setActive(['/', 'home']) }}">
        <a class="nav-link" href="{{url('/')}}">
            <i class="menu-icon mdi mdi-television"></i>
            <span class="menu-title">Dashboard</span>
        </a>
    </li>
    @if(Auth::user()->level == 'admin')
    <li class="nav-item {{ setActive(['dataatlet*','dataprestasi*']) }}">
        <a class="nav-link " data-toggle="collapse" href="#ui-master" aria-expanded="false" aria-controls="ui-basic">
            <i class="menu-icon mdi mdi-content-copy"></i>
            <span class="menu-title">Data Master</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse {{ setShow(['dataatlet*','dataprestasi*']) }}" id="ui-master">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link {{ setActive(['dataatlet*']) }}" href="/dataatlet">Data
                        Atlet</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setActive(['dataprestasi*']) }}" href="/dataprestasi">Data Prestasi
                        Atlet</a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item {{ setActive(['dataatletbaru*','dataukt*']) }}">
        <a class="nav-link " data-toggle="collapse" href="#ui-pendaftaran" aria-expanded="false"
            aria-controls="ui-basic">
            <i class="menu-icon mdi mdi-content-copy"></i>
            <span class="menu-title">Pendaftaran</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse {{ setShow(['dataukt*','dataatletbaru*']) }}" id="ui-pendaftaran">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link {{ setActive(['dataatletbaru*']) }}" href="#">Atlet Baru</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setActive(['dataukt*']) }}" href="/dataukt">Ujian Kenaikan
                        Tingkat</a>
                </li>
            </ul>
        </div>
    </li>

    <li class="nav-item {{ setActive(['spp*', 'kas*']) }}">
        <a class="nav-link " data-toggle="collapse" href="#ui-keuangan" aria-expanded="false" aria-controls="ui-basic">
            <i class="menu-icon mdi mdi-content-copy"></i>
            <span class="menu-title">Data Keuangan</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse {{ setShow(['spp*', 'kas*',]) }}" id="ui-keuangan">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                    <a class="nav-link {{ setActive(['spp*']) }}" href="/iuran">Data SPP</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setActive(['kas*']) }}" href="#">Data KAS</a>
                </li>
            </ul>
        </div>
    </li>
    @endif
    @if(Auth::user()->level == 'user')
    <li class="nav-item {{ setActive(['transaksi*']) }}">
        <a class="nav-link" href="#">
            <i class="menu-icon mdi mdi-backup-restore"></i>
            <span class="menu-title">Pendaftaran Ujian</span>
        </a>
    </li>
    <li class="nav-item {{ setActive(['transaksi*']) }}">
        <a class="nav-link" href="/dataprestasi">
            <i class="menu-icon mdi mdi-backup-restore"></i>
            <span class="menu-title">Data Prestasi</span>
        </a>
    </li>
    <li class="nav-item {{ setActive(['transaksi*']) }}">
        <a class="nav-link" href="#">
            <i class="menu-icon mdi mdi-backup-restore"></i>
            <span class="menu-title">Data SPP</span>
        </a>
    </li>
    @endif
</ul>