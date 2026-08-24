<!DOCTYPE html>
<html lang="ar" dir="rtl" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'لوحة التحكم - TimeTrack')</title>

    <!-- Google Fonts: Cairo -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Vite Styles and Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('css')
    @livewireStyles
</head>

<body class="font-sans antialiased bg-base-200 text-base-content min-h-screen">
    <div class="drawer lg:drawer-open">
        <input id="admin-sidebar-drawer" type="checkbox" class="drawer-toggle" />

        <!-- Main Content Wrapper -->
        <div class="drawer-content flex flex-col min-h-screen">

            <!-- Mobile Navbar Header -->
            <header class="navbar bg-base-100 shadow-sm border-b border-base-300 lg:hidden px-4">
                <div class="flex-none">
                    <label for="admin-sidebar-drawer" class="btn btn-square btn-ghost drawer-button">
                        <i class='bx bx-menu text-2xl'></i>
                    </label>
                </div>
                <div class="flex-1 px-2">
                    <a  href="{{ route('admin.users') }}" class="text-lg font-bold text-primary flex items-center gap-2">
                        <i class='bx bx-time-five text-xl'></i>
                        <span>TimeTrack</span>
                    </a>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-grow p-4 md:p-6 lg:p-8 space-y-6">
                {{ $slot ?? '' }}
                @yield('content')
            </main>
        </div>

        <!-- Sidebar Navigation Drawer -->
        <div class="drawer-side z-40">
            <label for="admin-sidebar-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
            <aside
                class="menu bg-base-100 text-base-content min-h-full w-80 p-4 border-e border-base-300 flex flex-col justify-between">

                <!-- Logo & Brand Header -->
                <div>
                    <div class="flex items-center gap-3 px-4 py-3 mb-6 border-b border-base-200 pb-5">
                        <div
                            class="avatar bg-primary text-primary-content rounded-xl p-2.5 flex items-center justify-center shadow-md">
                            <i class='bx bx-time-five text-2xl'></i>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold tracking-tight text-primary">TimeTrack</h2>
                            <span class="text-xs text-base-content/60 font-medium">لوحة المدير</span>
                        </div>
                    </div>

                    <!-- Navigation Links -->
                    <ul class="space-y-1.5">
                        <li
                            class="menu-title px-4 py-1.5 text-xs font-bold text-base-content/40 uppercase tracking-wider">
                            الرئيسية</li>
                        <li>
                            <a wire:navigate href="{{ route('admin.users') }}"
                                class="{{ request()->routeIs('admin.users') ? 'active bg-primary text-primary-content shadow-sm' : '' }} flex items-center gap-3 py-2.5 px-4 rounded-lg font-medium hover:bg-base-200 transition-all">
                                <i class='bx bxs-dashboard text-xl'></i>
                                <span>لوحة التحكم</span>
                            </a>
                        </li>
                        <li>
                            <a wire:navigate href="{{ route('admin.shifts.attendee') }}"
                                class="{{ request()->routeIs("admin.shifts.attendee") ? 'active bg-primary text-primary-content shadow-sm' : ''}}flex items-center justify-between gap-3 py-2.5 px-4 rounded-lg font-medium hover:bg-base-200 transition-all">
                                <span class="flex items-center gap-3">
                                    <i class='bx bx-book-content text-xl'></i>
                                    <span>سجل الحضور</span>
                                </span>

                            </a>
                        </li>

                        <li
                            class="menu-title px-4 py-1.5 text-xs font-bold text-base-content/40 uppercase tracking-wider mt-5">
                            الإدارة</li>
                        <li>
                            <a href="#"
                                class="flex items-center gap-3 py-2.5 px-4 rounded-lg font-medium hover:bg-base-200 transition-all">
                                <i class='bx bx-group text-xl'></i>
                                <span>الموظفين</span>
                            </a>
                        </li>
                        <li>
                            <a wire:navigate href="{{ route('admin.shifts') }}"
                                class="{{ request()->routeIs('admin.shifts') ? 'active bg-primary text-primary-content shadow-sm' : '' }} flex items-center gap-3 py-2.5 px-4 rounded-lg font-medium hover:bg-base-200 transition-all">
                                <i class='bx bx-time text-xl'></i>
                                <span>الشفتات</span>
                            </a>
                        </li>

                        <li
                            class="menu-title px-4 py-1.5 text-xs font-bold text-base-content/40 uppercase tracking-wider mt-5">
                            التقارير</li>
                        <li>
                            <a href="#"
                                class="flex items-center gap-3 py-2.5 px-4 rounded-lg font-medium hover:bg-base-200 transition-all">
                                <i class='bx bx-line-chart text-xl'></i>
                                <span>الأوفرتايم</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center gap-3 py-2.5 px-4 rounded-lg font-medium hover:bg-base-200 transition-all">
                                <i class='bx bx-edit-alt text-xl'></i>
                                <span>سجل التعديلات</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Admin Profile & Logout Footer -->
                <div class="border-t border-base-200 pt-4 flex items-center justify-between gap-2">
                    <div class="flex items-center gap-3">
                        <div class="avatar placeholder">
                            <div
                                class="bg-blue-600 text-white rounded-full w-10 h-10 flex items-center justify-center font-bold">
                                <span>أ</span>
                            </div>
                        </div>
                        <div>
                            <h4 class="font-bold text-sm text-base-content">أحمد المدير</h4>
                            <span class="text-xs text-base-content/60 font-medium">مدير النظام</span>
                        </div>
                    </div>
                    <a href="{{ route('logout') }}" class="btn btn-ghost btn-circle text-error hover:bg-error/10"
                        title="تسجيل الخروج">
                        <i class='bx bx-log-out text-xl'></i>
                    </a>
                </div>
            </aside>
        </div>
    </div>

    @stack('js')
    @livewireScripts
</body>

</html>
