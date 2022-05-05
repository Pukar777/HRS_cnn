<nav class="navbar navbar-dark bg-dark p-3">
    <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
        <a class="navbar-brand" href="#">
            HRS Cooperative
        </a>
        <button class="navbar-toggler d-md-none collapsed mb-3" type="button" data-toggle="collapse"
            data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="col-12 col-md-4 col-lg-2">
        <input class="form-control form-control bg-dark" type="text" placeholder="Search" aria-label="Search">
    </div>
    <div class="col-12 col-md-5 col-lg-8 d-flex align-items-center justify-content-md-end mt-3 mt-md-0">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-expanded="false">
                Hello, {{ Auth::user()->name }}
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Messages</a></li>
                <li><a class="dropdown-item" href="{{ route('auth.logout') }}">Sign out</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <div class="row">
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
            <div class="position-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('admin.dashboard') }}">
                            <span class="ml-2">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.user_manage.index') }}">
                            <span class="ml-2">User Management</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.role_manage.index') }}">
                            <span class="ml-2">Role Management</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.permission_manage.index') }}">
                            <span class="ml-2">Permission Management</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.transaction_manage.index') }}">
                            <span class="ml-2">Transaction Management</span>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="transactions">
                            <span class="ml-2">Transaction Management</span>
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.reports') }}">
                            <span class="ml-2">Reports</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

    </div>
</div>
