<!DOCTYPE html>
<html lang="ar" dir="rtl">
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
    
    <!-- Global & Sidebar CSS -->
    @vite(['resources/css/admin/global.css', 'resources/css/admin/sidebar.css'])
    
    <!-- Page Specific CSS -->
    @stack('css')
</head>
<body>
    <div class="app-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <div class="logo">
                    <h2>TimeTrack <i class='bx bx-time-five'></i></h2>
                    <span>لوحة المدير</span>
                </div>
            </div>
            
            <div class="sidebar-scrollable">
                <nav class="sidebar-nav">
                    <div class="nav-section">
                        <span class="nav-title">الرئيسية</span>
                        <a href="{{ route('admin.index') }}" class="nav-link {{ request()->routeIs('admin.index') ? 'active' : '' }}">
                            <i class='bx bxs-dashboard'></i>
                            <span>لوحة التحكم</span>
                        </a>
                        <a href="#" class="nav-link">
                            <i class='bx bx-book-content'></i>
                            <span>سجل الحضور</span>
                            <span class="badge">3</span>
                        </a>
                    </div>

                    <div class="nav-section">
                        <span class="nav-title">الإدارة</span>
                        <a href="#" class="nav-link">
                            <i class='bx bx-group'></i>
                            <span>الموظفين</span>
                        </a>
                        <a href="{{ route('admin.shifts') }}" class="nav-link {{ request()->routeIs('admin.shifts') ? 'active' : '' }}">
                            <i class='bx bx-time'></i>
                            <span>الشفتات</span>
                        </a>
                    </div>

                    <div class="nav-section">
                        <span class="nav-title">التقارير</span>
                        <a href="#" class="nav-link">
                            <i class='bx bx-line-chart'></i>
                            <span>الأوفرتايم</span>
                        </a>
                        <a href="#" class="nav-link">
                            <i class='bx bx-edit-alt'></i>
                            <span>سجل التعديلات</span>
                        </a>
                    </div>
                </nav>
            </div>

            <div class="sidebar-footer">
                <div class="user-profile">
                    <div class="avatar blue-avatar">أ</div>
                    <div class="user-info">
                        <h4>أحمد المدير</h4>
                        <span>مدير النظام</span>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            @yield('content')
        </main>
    </div>
    
    <!-- Page Specific JS -->
    @stack('js')
</body>
</html>
