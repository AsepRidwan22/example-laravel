<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            @can('koordinator')
                <li class="nav-item ">
                    <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                        <span data-feather="home" class="align-text-bottom"></span>
                        Dashboard
                    </a>
                </li>
            @endcan
            @cannot('koordinator')
                @cannot('dosen')
                    @cannot('mahasiswa')
                        <li class="nav-item ">
                            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page"
                                href="/dashboard">
                                <span data-feather="home" class="align-text-bottom"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link {{ Request::is('dashboard/rekapitulasi') ? 'active' : '' }}" aria-current="page"
                                href="/dashboard/rekapitulasi">
                                <span data-feather="home" class="align-text-bottom"></span>
                                Rekapitulasi
                            </a>
                        </li>
                    @endcannot
                @endcannot
            @endcannot
            @canany(['koordinator', 'dosen', 'mahasiswa'])
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/profile*') ? 'active' : '' }}" href="/dashboard/profile">
                        <span data-feather="user" class="align-text-bottom"></span>
                        Profile
                    </a>
                </li>
            @endcanany
            @can('mahasiswa')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/proposals/create') ? 'active' : '' }}"
                        href="/dashboard/proposals/create">
                        <span data-feather="file-text" class="align-text-bottom"></span>
                        Proposal
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/logbooks*') ? 'active' : '' }}" href="/dashboard/logbooks">
                        <span data-feather="file-text" class="align-text-bottom"></span>
                        Logbook
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/progres*') ? 'active' : '' }}" href="/dashboard/progres">
                        <span data-feather="file-text" class="align-text-bottom"></span>
                        Progres
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/dosens*') ? 'active' : '' }}" href="/dashboard/dosens">
                        <span data-feather="file-text" class="align-text-bottom"></span>
                        Dosen Pembimbing
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/seminars/create*') ? 'active' : '' }}"
                        href="/dashboard/seminars/create">
                        <span data-feather="file-text" class="align-text-bottom"></span>
                        Seminar
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/seminars/jadwal/show*') ? 'active' : '' }}"
                        href="/dashboard/seminars/jadwal/show">
                        <span data-feather="file-text" class="align-text-bottom"></span>
                        Jadwal Seminar
                    </a>
                </li>
            @endcan
            @can('dosen')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/mahasiswas*') ? 'active' : '' }}"
                        href="/dashboard/mahasiswas">
                        <span data-feather="file-text" class="align-text-bottom"></span>
                        Mahasiswa
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/logbooks*') ? 'active' : '' }}"
                        href="/dashboard/logbooks">
                        <span data-feather="file-text" class="align-text-bottom"></span>
                        Logbook
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/progres*') ? 'active' : '' }}" href="/dashboard/progres">
                        <span data-feather="file-text" class="align-text-bottom"></span>
                        Progres
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/seminars*') ? 'active' : '' }}"
                        href="/dashboard/seminars/create">
                        <span data-feather="file-text" class="align-text-bottom"></span>
                        Seminars
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/penilaians/bimbingan*') ? 'active' : '' }}"
                        href="/dashboard/penilaians/bimbingan">
                        <span data-feather="file-text" class="align-text-bottom"></span>
                        Nilai Bimbingan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/penilaians/penguji*') ? 'active' : '' }}"
                        href="/dashboard/penilaians/penguji">
                        <span data-feather="file-text" class="align-text-bottom"></span>
                        Nilai Seminar
                    </a>
                </li>
            @endcan
            @can('koordinator')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/proposals*') ? 'active' : '' }}"
                        href="/dashboard/proposals">
                        <span data-feather="file-text" class="align-text-bottom"></span>
                        Proposal
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/bimbingans*') ? 'active' : '' }}"
                        href="/dashboard/bimbingans">
                        <span data-feather="file-text" class="align-text-bottom"></span>
                        Bimbingan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/seminars*') ? 'active' : '' }}"
                        href="/dashboard/seminars">
                        <span data-feather="file-text" class="align-text-bottom"></span>
                        Seminar
                    </a>
                </li>
            @endcan
        </ul>
        @can('koordinator')
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Administrator</span>
            </h6>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/mahasiswas*') ? 'active' : '' }}"
                        href="/dashboard/mahasiswas">
                        <span data-feather="file-text" class="align-text-bottom"></span>
                        Mahasiswa
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/dosens*') ? 'active' : '' }}" href="/dashboard/dosens">
                        <span data-feather="file-text" class="align-text-bottom"></span>
                        Dosen
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/instansis*') ? 'active' : '' }}"
                        href="/dashboard/instansis">
                        <span data-feather="file-text" class="align-text-bottom"></span>
                        Pembimbing Instansi
                    </a>
                </li>
            </ul>
        @endcan

    </div>
</nav>
