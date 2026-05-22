@extends('layouts.admin')

@section('title', 'لوحة التحكم - TimeTrack')
@vite(['resources/css/admin/dashboard.css'])


@section('content')
    <header class="top-header">
        <div class="header-right">
            <h1>لوحة التحكم</h1>
            <p>نظرة عامة — {{ \Carbon\Carbon::now()->locale('ar')->translatedFormat('l d F Y') }}</p>
        </div>
        <div class="header-left">
            <div class="status-indicator">
                <span class="dot pulse-green"></span> مباشر
            </div>
            <button class="btn btn-outline">تصدير</button>
            <button class="btn btn-primary"><i class='bx bx-plus'></i> تسجيل يدوي</button>
        </div>
    </header>

    <!-- Stats Cards Grid -->
    <div class="stats-grid">
        <div class="stat-card border-green">
            <div class="stat-header">
                <h3>حاضرين</h3>
                <span class="stat-value green-text">24</span>
            </div>
            <div class="stat-footer">
                <p>من 28 موظف</p>
            </div>
        </div>

        <div class="stat-card border-red">
            <div class="stat-header">
                <h3>غائبين</h3>
                <span class="stat-value red-text">4</span>
            </div>
            <div class="stat-footer">
                <p>2 بدون إذن</p>
            </div>
        </div>

        <div class="stat-card border-orange">
            <div class="stat-header">
                <h3>متأخرين</h3>
                <span class="stat-value orange-text">3</span>
            </div>
            <div class="stat-footer">
                <p>متوسط 22 دقيقة</p>
            </div>
        </div>

        <div class="stat-card border-purple">
            <div class="stat-header">
                <h3>بدون logout</h3>
                <span class="stat-value purple-text">1</span>
            </div>
            <div class="stat-footer">
                <p>يحتاج مراجعة</p>
            </div>
        </div>
    </div>

    <!-- Attendance Table Section -->
    <div class="table-section">
        <div class="table-header">
            <h2>سجل الحضور اليوم</h2>
            <div class="table-filters">
                <button class="filter-btn active">الكل</button>
                <button class="filter-btn">متأخر</button>
                <button class="filter-btn">بدون خروج</button>
                <button class="filter-btn">معدل</button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="attendance-table">
                <thead>
                    <tr>
                        <th>الموظف</th>
                        <th>الشفت</th>
                        <th>دخول</th>
                        <th>خروج</th>
                        <th>الساعات</th>
                        <th>الحالة</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Row 1 -->
                    <tr>
                        <td>
                            <div class="employee-info">
                                <div class="avatar-circle bg-blue">مح</div>
                                <div class="emp-details">
                                    <strong>محمد علي</strong>
                                    <span>#EMP-001</span>
                                </div>
                            </div>
                        </td>
                        <td class="shift-name text-cyan">صباحي A</td>
                        <td class="time-green">08:03</td>
                        <td class="time-blue">17:15</td>
                        <td>
                            <div class="hours-info">
                                <strong>9.2</strong>
                                <span class="overtime text-orange">+1.2</span>
                            </div>
                        </td>
                        <td><span class="status-badge status-present"><span class="dot"></span> حاضر</span></td>
                        <td><button class="btn-edit">تعديل</button></td>
                    </tr>


                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('ui_template/js/script.js') }}"></script>
@endpush
