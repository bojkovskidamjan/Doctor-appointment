<div class="page-wrap">
    <div class="app-sidebar colored">
        <div class="sidebar-header">
            <a class="header-brand" href="/">
                <div class="logo-img">
                    <img src="{{asset('template/src/img/doctor.svg')}}" class="header-brand-img"
                         alt="lavalite">
                </div>
                <span class="text">Doctor app</span>
            </a>
            <button type="button" class="nav-toggle"><i data-toggle="expanded"
                                                        class="ik ik-toggle-right toggle-icon"></i></button>
            <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
        </div>

        <div class="sidebar-content">
            <div class="nav-container">
                <nav id="main-menu-navigation" class="navigation-main">

                    <div class="nav-item active">
                        <a href="/"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                    </div>

                    <div class="nav-lavel">MODELS</div>
                    @if (auth()->check() && auth()->user()->role->name === 'admin')
                        <div class="nav-item has-sub">
                            <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Doctor</span>
                                <span class="badge badge-danger"></span></a>
                            <div class="submenu-content">
                                <a href="{{route('doctors.index')}}" class="menu-item">View all doctors</a>
                                <a href="{{route('doctors.create')}}" class="menu-item">Create</a>

                            </div>
                        </div>
                    @endif
                    @if (auth()->check() &&  auth()->user()->role->name === 'doctor')
                        <div class="nav-item has-sub">
                            <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Appointment Time</span>
                                <span class="badge badge-danger"></span></a>
                            <div class="submenu-content">
                                <a href="{{route('appointment.index')}}" class="menu-item">Check</a>
                                <a href="{{route('appointment.create')}}" class="menu-item">Create</a>
                            </div>
                        </div>
                    @endif
                    @if (auth()->check() &&  auth()->user()->role->name === 'doctor')
                        <div class="nav-item has-sub">
                            <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Patients</span>
                                <span class="badge badge-danger"></span></a>
                            <div class="submenu-content">
                                <a href="{{route('patients.today')}}" class="menu-item">Today's patients</a>
                                <a href="{{route('prescribed.patients')}}" class="menu-item">All patients</a>
                            </div>
                        </div>
                    @endif
                    @if (auth()->check() && (auth()->user()->role->name === 'admin' || auth()->user()->role->name === 'doctor'))
                        <div class="nav-item has-sub">
                            <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Patient Appointments</span>
                                <span class="badge badge-danger"></span></a>
                            <div class="submenu-content">
                                <a href="{{route('patients.index')}}" class="menu-item">Today Appointments</a>
                                <a href="{{route('patients.all.appointments')}}" class="menu-item">All Time
                                    Appointments</a>
                            </div>
                        </div>
                    @endif
                    <div class="nav-item active">
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="ik ik-power dropdown-icon"></i>
                            <span>Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>

