@php
    $userName = 'Principal Admin';
    $userEmail = 'admin@schoollms.com';
    $role = session('role');

    if (isset($authUser)) {
        $userEmail = $authUser->email;
        if ($role == 'admin') {
            $userName = $authUser->admin_name ?? 'Principal Admin';
        } elseif ($role == 'teacher') {
            $userName = $authUser->name;
        } elseif ($role == 'student') {
            $userName = $authUser->student_name;
        } elseif ($role == 'parent') {
            $userName = $authUser->parent_name;
        }
    }
@endphp

<div class="main-content-header">
    <button class="btn toggle-button d-md-none mb-3" id="sidebarToggle" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
        <i class="fas fa-bars"></i> Menu
    </button>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold ps-2">@yield('title', 'Admin Dashboard')</h4>

        <div class="dropdown">
            <a href="javascript:void(0)" class="d-flex align-items-center text-decoration-none dropdown-toggle no-arrow"
                id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">

                <img src="https://ui-avatars.com/api/?name={{ urlencode($userName) }}&background=0056b3&color=fff"
                    class="rounded-circle border border-2 border-white" width="40" height="40">
            </a>

            <ul class="dropdown-menu dropdown-menu-end profile-box shadow p-3" aria-labelledby="profileDropdown">

                <li class="text-center mb-3">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($userName) }}&background=fff&color=0056b3"
                        class="rounded-circle mb-2 shadow-sm" width="80" height="80">
                    <h6 class="fw-bold text-white mb-0">{{ $userName }}</h6>
                    <small class="text-white-50">{{ $userEmail }}</small>

                    <div class="mt-2">
                        <a href="javascript:void(0)" class="btn btn-outline-light btn-sm rounded-pill px-3">
                            Manage your profile
                        </a>
                    </div>
                </li>

                <li>
                    <hr class="dropdown-divider bg-white opacity-25">
                </li>

                <li>
                    <a class="dropdown-item d-flex align-items-center py-2 rounded" href="javascript:void(0)">
                        <i class="fas fa-cog me-3 opacity-75"></i> Settings
                    </a>
                </li>

                <li>
                    <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display: none;">
                        @csrf
                    </form>

                    <a class="dropdown-item d-flex align-items-center py-2 rounded" href="javascript:void(0)"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt me-3 opacity-75"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
