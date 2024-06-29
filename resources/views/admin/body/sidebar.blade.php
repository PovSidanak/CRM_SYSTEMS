<style>
    .sidebar .sidebar-body .nav .nav-item .nav-link {
        color: black;
    }

    .sidebar .sidebar-body .nav.sub-menu .nav-item .nav-link {
        color: gray;
    }
</style>
<nav class="sidebar" style="background-color: aliceblue;border:none;">
    <div class="sidebar-header" style="background-color: #9BC5DE;border:none">
        <a href="#" class="sidebar-brand">
            DEAM<span>CRM</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body" style="background-color: #9BC5DE; border:none; box-shadow:none">
        <ul class="nav">
            <li class="nav-item nav-category" style="color: aliceblue;">Main</li>
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="home"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category"style="color: aliceblue;">Page</li>


            @if (Auth::user()->can('menu.type'))
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false"
                        aria-controls="emails">
                        <i class="link-icon" data-feather="mail"></i>
                        <span class="link-title">Service Type</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="emails">
                        <ul class="nav sub-menu">
                            @if (Auth::user()->can('all.type'))
                                <li class="nav-item">
                                    <a href="{{ route('all.type') }}" class="nav-link">All Type</a>
                                </li>
                            @endif
                            @if (Auth::user()->can('add.type'))
                                <li class="nav-item">
                                    <a href="pages/email/read.html" class="nav-link">Add Type</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
            @endif
            @if (Auth::user()->can('all.customer'))
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#client" role="button" aria-expanded="false"
                        aria-controls="emails">
                        <i class="link-icon" data-feather="users"></i>
                        <span class="link-title">Client</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="client">
                        @if (Auth::user()->can('all.customer'))
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="{{ route('all.customers') }}" class="nav-link">All Clients</a>
                                </li>
                        @endif
                        @if (Auth::user()->can('all.lead'))
                <li class="nav-item">
                    <a href="{{ route('all.leads') }}" class="nav-link">All Leads</a>
                </li>
            @endif
            @if (Auth::user()->can('all.service'))
                <li class="nav-item">
                    <a href="{{ route('all.services') }}" class="nav-link">All Services</a>
                </li>
            @endif
        </ul>
    </div>
    </li>
    @endif
    @if (Auth::user()->can('all.ticket'))
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#Ticket" role="button" aria-expanded="false"
                aria-controls="emails">
                <i class="link-icon" data-feather="clipboard"></i>
                <span class="link-title">Ticket</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="Ticket">
                @if (Auth::user()->can('all.atm'))
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('all.atms') }}" class="nav-link">All Atm</a>
                        </li>
                @endif
                @if (Auth::user()->can('all.ticket'))
        <li class="nav-item">
            <a href="{{ route('all.tickets') }}" class="nav-link">All Ticket</a>
        </li>
    @endif
    @if (Auth::user()->can('all.servicerequest'))
        <li class="nav-item">
            <a href="{{ route('all.servicerequest') }}" class="nav-link">Service Request</a>
        </li>
    @endif
    </ul>
    </div>
    </li>
    @endif
    @if (Auth::user()->can('all.sale.report'))
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#report" role="button" aria-expanded="false"
                aria-controls="emails">
                <i class="link-icon" data-feather="folder-plus"></i>
                <span class="link-title">Report</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="report">
                <ul class="nav sub-menu">
                    @if (Auth::user()->can('all.sale.report'))
                        <li class="nav-item">
                            <a href="{{ route('all.salereports') }}" class="nav-link">Sale Report</a>
                        </li>
                    @endif
                    @if (Auth::user()->can('all.technical.report'))
                        <li class="nav-item">
                            <a href="{{ route('all.techniclereports') }}" class="nav-link">Technical Report</a>
                        </li>
                    @endif
                </ul>
            </div>
        </li>
    @endif
    @if (Auth::user()->can('all.event'))
        <li class="nav-item">
            <a href="{{ route('all.calendars') }}" class="nav-link">
                <i class="link-icon" data-feather="calendar"></i>
                <span class="link-title">Calendar</span>
            </a>
        </li>
    @endif
    @if (Auth::user()->can('all.user'))
        <li class="nav-item nav-category" style="color: aliceblue;">USER ALL FUNCTION</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#admin" role="button" aria-expanded="false"
                aria-controls="admin">
                <i class="link-icon" data-feather="user-plus"></i>
                <span class="link-title">Manage User</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="admin">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                        <a href="{{ route('all.admin') }}" class="nav-link">All User</a>
                    </li>
                </ul>
            </div>
        </li>
    @endif
    @if (Auth::user()->can('all.role'))
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false"
                aria-controls="advancedUI">
                <i class="link-icon" data-feather="shield"></i>
                <span class="link-title">Role & Permission</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="advancedUI">
                <ul class="nav sub-menu">
                    <nav>
                        @if (Auth::user()->can('all.permission'))
                            <li class="nav-item">
                                <a href="{{ route('allpermission') }}" class="nav-link">Permission</a>
                            </li>
                        @endif
                        {{-- <li class="nav-item">
                <a href="{{route('listrole')}}" class="nav-link">Role</a>
              </li> --}}
                        {{-- <li class="nav-item">
                <a href="{{route('addrolepermission')}}" class="nav-link">Role in Permission</a>
              </li> --}}
                        @if (Auth::user()->can('all.role'))
                            <li class="nav-item">
                                <a href="{{ route('allrolepermission') }}" class="nav-link">All Role in
                                    Permission</a>
                            </li>
                        @endif
                    </nav>
                </ul>
            </div>
        </li>
    @endif
    </ul>
    </div>
</nav>
