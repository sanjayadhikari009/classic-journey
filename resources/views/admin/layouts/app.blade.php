<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classic Journeys Admin - @yield('title', 'Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
    .sidebar-gradient {
        background: linear-gradient(180deg, #1e3a8a 0%, #1e40af 100%);
    }

    .sidebar-shadow {
        box-shadow: 0 4px 24px 0 rgba(30, 58, 138, 0.12);
    }

    .sidebar-avatar {
        background: linear-gradient(135deg, #3b82f6 0%, #60a5fa 100%);
        box-shadow: 0 2px 8px 0 rgba(30, 58, 138, 0.10);
    }

    .sidebar-link {
        transition: background 0.2s, color 0.2s, box-shadow 0.2s;
    }

    .sidebar-link.active,
    .sidebar-link:hover {
        background: #1e40af !important;
        color: #fff !important;
        box-shadow: 0 2px 8px 0 rgba(30, 64, 175, 0.10);
    }

    .sidebar-link svg {
        transition: color 0.2s;
    }

    .sidebar-link.active svg,
    .sidebar-link:hover svg {
        color: #fff !important;
    }

    .sidebar-section-title {
        font-size: 0.85rem;
        color: #93c5fd;
        letter-spacing: 0.05em;
        margin: 1.5rem 0 0.5rem 1.5rem;
        text-transform: uppercase;
        font-weight: 600;
    }

    @media (max-width: 768px) {
        .sidebar-avatar {
            width: 64px;
            height: 64px;
        }
    }
    </style>
</head>

<body class="bg-gray-100 min-h-screen overflow-x-hidden"
    x-data="{ sidebarOpen: false, openRole: false, openTrade: false, openProduct: false }">
    @php($active = $active ?? '')
    <div class="flex gap-6">
        <!-- Sidebar -->
        <div id="admin-side"
            class="w-[350px] fixed md:relative top-0 left-0  d-md-block sidebar-gradient z-50  py-4 min-vh-100 transform -translate-x-full md:translate-x-0 transition-transform duration-300">
            <button id="close-side-button" class="absolute top-2 right-2 z-20 text-white md:hidden">
                <i class="fas fa-times"></i>
            </button>
            <div>
                <div class="d-flex flex-column align-items-center mb-4">
                    <img src="/images/travel_stride.svg" alt="Classic Journeys Logo" class="mb-2" width="64" height="64">
                    <span class="text-white fw-bold">Classic Journeys</span>
                </div>
                <h4 class="text-white px-3 mb-4">Classic <span class="text-info">Journeys</span></h4>
                <ul class="nav flex-column mb-4">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('admin.products.index') }}">
                            <i class="fas fa-box me-2"></i> Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/admin/dashboard">
                            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                        </a>
                    </li>
                </ul>
                <h6 class="text-white-50 px-3 mt-4 mb-2">Management</h6>
                <ul class="nav flex-column mb-4">
                    <li class="nav-item">
                        <span class="nav-link text-white-50"><i class="fas fa-users-cog me-2"></i> Role</span>
                        <ul class="nav flex-column ms-4">
                            <li class="nav-item">
                                <a class="nav-link text-white-50"
                                    href="{{ route('admin.admin.members.index') }}">Members list</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white-50" href="#">Grab Order list</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link text-white-50"><i class="fas fa-exchange-alt me-2"></i> Trade</span>
                        <ul class="nav flex-column ms-4">
                            <li class="nav-item"><a class="nav-link text-white-50"
                                    href="{{ route('admin.order.list') }}">Order list</a></li>
                            <li class="nav-item"><a class="nav-link text-white-50"
                                    href="{{ route('admin.withdraw.list') }}">Withdraw Management</a></li>
                            <li class="nav-item"><a class="nav-link text-white-50"
                                    href="{{ route('admin.deposite.list') }}">Deposite Management</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white-50" href="{{ route('admin.trips.index') }}"><i
                                class="fas fa-map-marked-alt me-2"></i> Trip Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white-50" href="{{ route('admin.companies.index') }}"><i
                                class="fas fa-building me-2"></i> Company Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white-50" href="{{ route('admin.reviews.index') }}"><i
                                class="fas fa-star me-2"></i> Review Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white-50" href="{{ route('admin.level.setting') }}">
                            <i class="fas fa-layer-group me-2"></i> Level Setting
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white-50" href="{{ route('admin.wallet.settings') }}">
                            <i class="fas fa-wallet me-2"></i> Wallet Settings
                        </a>
                    </li>
                </ul>
                <div class="mt-auto px-3">
                    <div class="d-flex align-items-center mb-3">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-white text-sm"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <p class="text-white text-sm mb-0">{{ Auth::user()->name ?? 'Admin' }}</p>
                            <p class="text-white-50 text-xs mb-0">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('admin.logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger w-100 text-white">
                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Main Content -->
        <main id="admin-content" class="w-full md:w-[cal(100%-350px)] py-4">

            <button id="admin-side-button" class="flex md:hidden items-center  text-black mb-4 pl-6">

                <i class="fa-solid fa-bars "></i>

            </button>
            @yield('content')
        </main>
    </div>
    </div>
</body>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const menuButton = document.getElementById('admin-side-button');
    const closeButton = document.getElementById('close-side-button');
    const userSide = document.getElementById('admin-side');
    const mainContent = document.getElementById('admin-content');

    menuButton?.addEventListener('click', function(e) {
        e.stopPropagation();
        userSide.classList.remove('invisible', '-translate-x-full');
        userSide.classList.add('translate-x-0');

        // Add overflow-hidden to prevent horizontal scrolling
        document.body.classList.add('overflow-x-hidden');
    });

    closeButton?.addEventListener('click', function(e) {
        e.stopPropagation();
        userSide.classList.add('-translate-x-full');
        userSide.classList.remove('translate-x-0');

        // Remove overflow restriction
        document.body.classList.remove('overflow-x-hidden');
        // Hide completely after animation
        setTimeout(() => {
            userSide.classList.add('invisible');
        }, 300);
    });

    document.addEventListener('click', function(e) {
        if (userSide && !userSide.contains(e.target) && !menuButton.contains(e.target)) {
            userSide.classList.add('-translate-x-full');
            userSide.classList.remove('translate-x-0');
            document.body.classList.remove('overflow-x-hidden');
            // Hide completely after animation
            setTimeout(() => {
                userSide.classList.add('invisible');
            }, 300);
        }
    });

    // User dropdown functionality
    const userMenuButton = document.getElementById('user-menu-button');
    const userDropdown = document.getElementById('user-dropdown');

    if (userMenuButton && userDropdown) {
        userMenuButton.addEventListener('click', function(e) {
            e.stopPropagation();
            userDropdown.classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!userMenuButton.contains(e.target) && !userDropdown.contains(e.target)) {
                userDropdown.classList.add('hidden');
            }
        });
    }
});
</script>

</html>