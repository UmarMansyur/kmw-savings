<div class="left-sidenav">
    <!-- LOGO -->
    <div class="brand">
        <a href="index.html" class="logo">
            <span>
                <img src="{{ url('/images/logo-sm.png') }}" alt="logo-small" class="logo-sm" />
            </span>
            <span>
                <img src="{{ url('/images/logo.png') }}" alt="logo-large" class="logo-lg logo-light" />
                <img src="{{ url('/images/logo-dark.png') }}" alt="logo-large" class="logo-lg logo-dark" />
            </span>
        </a>
    </div>
    <!--end logo-->
    <div class="menu-content h-100" data-simplebar>
        <ul class="metismenu left-sidenav-menu">
            <li>
                <div class="text-center">
                    @if(Auth::user()->thumbnail)
                    <div class="mt-3">
                        <img src="{{ url('/storage/employes/images/' . Auth::user()->thumbnail) }}" alt="" class="rounded-circle d-block mx-auto mb-3" height="140" width="140" style="border: 5px solid white; object-fit: cover; object-position: top;">
                    </div>
                    @elseif(empty(Auth::user()->thumbnail))
                    <img src="{{ url('/images/default.jpg') }}" alt="" height="140" width="140" class="rounded-circle d-block mx-auto mb-3" style="border: 5px solid white; object-fit: cover; object-position: top;">
                    @elseif(request()->session()->get('user')[0]->thumbnail)
                    <img src="{{ url('/storage/members/images/' . request()->session()->get('user')[0]->thumbnail) }}" alt="" height="140" width="140" class="rounded-circle d-block mx-auto mb-3" style="border: 5px solid white; object-fit: cover; object-position: top;">
                    @elseif(request()->session()->get('user')[0]->thumbnail == null)
                    <img src="{{ url('/images/default.jpg') }}" alt="" height="140" width="140" class="rounded-circle d-block mx-auto mb-3" style="border: 5px solid white; object-fit: cover; object-position: top;">
                    @endisset
                    <span class="text-white" style="font-size: 20px; font-weight:700;">{{ Auth::user() ? Auth::user()->name : request()->session()->get('user')[0]->name  }}</span>
                </div>
            </li>
            <li class="menu-label mt-4">Main</li>
            <li class="{{request()->path() === 'dashboard' ? 'mm-active' : '' }}">
                <a href="{{ Auth::user() ? '/admin/dashboard' : '/user/dashboard'  }}">
                    <i data-feather="home" class="align-self-start menu-icon"></i>
                    <span style="font-size: 14px">Dashboard</span>
                </a>
            </li>
            <li class="menu-label mt-3">Data</li>
            @isset(Auth::user()->id)
            <li class="mb-2">
                <a href="/admin/saving">
                    <i data-feather="credit-card" class="align-self-start menu-icon"></i>
                    <span style="font-size: 14px">Tabungan</span>
                </a>
            </li>
            @endisset
            <li>
                <a href="{{ Auth::user() ? '/admin/report' : '/user/report'  }}">
                    <i data-feather="file-text" class="align-self-start menu-icon"></i>
                    <span style="font-size: 14px">Laporan</span>
                </a>
            </li>
            @isset(Auth::user()->id)
            <li class="menu-label mt-3">Settings</li>
            <li>
                <a href="javascript: void(0);">
                    <i data-feather="settings" class="align-self-start menu-icon"></i>
                    <span style="font-size: 14px">Pengaturan</span>
                    <span class="menu-arrow">
                        <i class="mdi mdi-chevron-right"></i>
                    </span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/setting/karyawan"><i class="ti-control-record"></i>Karyawan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/setting/jamaah"><i class="ti-control-record"></i>Jamaah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/setting/categories"><i class="ti-control-record"></i>Kategori Tabungan</a>
                    </li>
                </ul>
            </li>
            @endisset
        </ul>
    </div>
</div>