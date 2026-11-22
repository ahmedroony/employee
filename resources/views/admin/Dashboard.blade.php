@extends('layouts.admin')

@section('title', 'لوحة التحكم - TimeTrack')

@section('content')
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 pb-5 border-b border-base-300">
        <div>
            <h1 class="text-3xl font-extrabold tracking-tight">لوحة التحكم</h1>
            <p class="text-base-content/60 text-sm mt-1">نظرة عامة — {{ \Carbon\Carbon::now()->locale('ar')->translatedFormat('l d F Y') }}</p>
        </div>
        <div class="flex items-center gap-3">
            <div class="badge badge-success badge-outline gap-1.5 px-3 py-3 font-semibold">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-success opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-success"></span>
                </span>
                مباشر
            </div>
            <button class="btn btn-outline btn-sm">تصدير</button>
            <button class="btn btn-primary btn-sm"><i class='bx bx-plus text-base'></i> تسجيل يدوي</button>
        </div>
    </div>

    <!-- Stats Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Card 1 -->
        <div class="card bg-base-100 shadow-sm border-s-4 border-success">
            <div class="card-body p-5">
                <div class="flex justify-between items-center">
                    <span class="text-base-content/60 font-semibold text-sm">حاضرين</span>
                    <div class="p-2 bg-success/10 text-success rounded-lg"><i class='bx bx-user-check text-xl'></i></div>
                </div>
                <div class="mt-2">
                    <span class="text-3xl font-bold text-success">24</span>
                </div>
                <p class="text-xs text-base-content/50 mt-1">من 28 موظف</p>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="card bg-base-100 shadow-sm border-s-4 border-error">
            <div class="card-body p-5">
                <div class="flex justify-between items-center">
                    <span class="text-base-content/60 font-semibold text-sm">غائبين</span>
                    <div class="p-2 bg-error/10 text-error rounded-lg"><i class='bx bx-user-x text-xl'></i></div>
                </div>
                <div class="mt-2">
                    <span class="text-3xl font-bold text-error">4</span>
                </div>
                <p class="text-xs text-base-content/50 mt-1">2 بدون إذن</p>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="card bg-base-100 shadow-sm border-s-4 border-warning">
            <div class="card-body p-5">
                <div class="flex justify-between items-center">
                    <span class="text-base-content/60 font-semibold text-sm">متأخرين</span>
                    <div class="p-2 bg-warning/10 text-warning rounded-lg"><i class='bx bx-time-five text-xl'></i></div>
                </div>
                <div class="mt-2">
                    <span class="text-3xl font-bold text-warning">3</span>
                </div>
                <p class="text-xs text-base-content/50 mt-1">متوسط 22 دقيقة</p>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="card bg-base-100 shadow-sm border-s-4 border-secondary">
            <div class="card-body p-5">
                <div class="flex justify-between items-center">
                    <span class="text-base-content/60 font-semibold text-sm">بدون تسجيل خروج</span>
                    <div class="p-2 bg-secondary/10 text-secondary rounded-lg"><i class='bx bx-log-out-circle text-xl'></i></div>
                </div>
                <div class="mt-2">
                    <span class="text-3xl font-bold text-secondary">1</span>
                </div>
                <p class="text-xs text-base-content/50 mt-1">يحتاج مراجعة</p>
            </div>
        </div>
    </div>

    <!-- Attendance Table Section -->
    <div class="card bg-base-100 shadow-sm border border-base-300">
        <div class="card-body p-0">
            <!-- Table Header with Filters -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 p-6 border-b border-base-200">
                <h2 class="card-title text-xl font-bold">سجل الحضور اليوم</h2>
                <div class="join">
                    <button class="join-item btn btn-sm btn-active">الكل</button>
                    <button class="join-item btn btn-sm btn-ghost">متأخر</button>
                    <button class="join-item btn btn-sm btn-ghost">بدون خروج</button>
                    <button class="join-item btn btn-sm btn-ghost">معدل</button>
                </div>
            </div>

            <!-- Table responsive wrapper -->
            <div class="overflow-x-auto w-full">
                <table class="table table-zebra table-md w-full">
                    <thead>
                        <tr class="bg-base-200/50 text-base-content/75 font-semibold text-sm">
                            <th>الموظف</th>
                            <th>الشفت</th>
                            <th>دخول</th>
                            <th>خروج</th>
                            <th>الساعات</th>
                            <th>الحالة</th>
                            <th class="w-20">العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Row 1 -->
                        <tr class="hover:bg-base-200/30 transition-colors">
                            <td>
                                <div class="flex items-center gap-3">
                                    <div class="avatar placeholder">
                                        <div class="bg-blue-100 text-blue-600 rounded-full w-10 h-10 flex items-center justify-center font-bold">
                                            <span>مح</span>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-bold text-sm">محمد علي</div>
                                        <div class="text-xs text-base-content/50">#EMP-001</div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-cyan-600 font-semibold">صباحي A</td>
                            <td class="text-success font-medium">08:03</td>
                            <td class="text-info font-medium">17:15</td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <span class="font-bold">9.2</span>
                                    <span class="badge badge-sm badge-warning text-xs font-semibold">+1.2</span>
                                </div>
                            </td>
                            <td>
                                <span class="badge badge-success badge-outline gap-1 font-semibold text-xs">
                                    <span class="w-1.5 h-1.5 rounded-full bg-success"></span>
                                    حاضر
                                </span>
                            </td>
                            <td>
                                <button class="btn btn-ghost btn-xs text-primary font-semibold hover:bg-primary/10">تعديل</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('ui_template/js/script.js') }}"></script>
@endpush

