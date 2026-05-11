@extends('layouts.admin')

@section('title', 'إضافة شفت جديد - TimeTrack')

    @vite(['resources/css/admin/CreateShift.css'])


@section('content')
    <header class="top-header">
        <div class="header-right">
            <div class="breadcrumb">
                <a href="{{ route('admin.shifts') }}">إدارة الشفتات</a>
                <i class='bx bx-chevron-left'></i>
                <span>إضافة شفت جديد</span>
            </div>
            <h1>إضافة شفت جديد</h1>
            <p>قم بإنشاء شفت عمل جديد وتحديد المواعيد والقواعد الخاصة به</p>
        </div>
        <div class="header-left">
            <a href="{{ route('admin.shifts') }}" class="btn btn-outline">إلغاء</a>
            <button type="submit" form="create-shift-form" class="btn btn-primary">حفظ الشفت</button>
        </div>
    </header>

    <div class="form-container">
        <form id="create-shift-form" action="" method="POST" class="premium-form">
            @csrf

            <div class="form-grid">
                <!-- Basic Info Section -->
                <div class="form-section">
                    <div class="section-header">
                        <i class='bx bx-info-circle'></i>
                        <h3>المعلومات الأساسية</h3>
                    </div>

                    <div class="input-group">
                        <label for="shift_name">اسم الشفت</label>
                        <input type="text" id="shift_name" name="shift_name" placeholder="مثال: شفت صباحي A" required>
                        <span class="input-hint">يفضل أن يكون الاسم فريداً ومعبراً</span>
                    </div>

                    <div class="input-row">
                        <div class="input-group">
                            <label for="start_time">وقت البدء</label>
                            <div class="time-input-wrapper">
                                <i class='bx bx-time'></i>
                                <input type="time" id="start_time" name="start_time" required>
                            </div>
                        </div>
                        <div class="input-group">
                            <label for="end_time">وقت النهاية</label>
                            <div class="time-input-wrapper">
                                <i class='bx bx-time'></i>
                                <input type="time" id="end_time" name="end_time" required>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="input-group">
                        <label for="description">وصف إضافي</label>
                        <textarea id="description" name="description" rows="3" placeholder="أضف أي ملاحظات إضافية حول هذا الشفت..."></textarea>
                    </div> --}}
                </div>

                {{-- <!-- Overtime & Rules Section -->
                <div class="form-section">
                    <div class="section-header">
                        <i class='bx bx-cog'></i>
                        <h3>قواعد العمل والإضافي</h3>
                    </div>

                    <div class="input-group">
                        <label for="overtime_rate">معدل الأوفرتايم (x)</label>
                        <div class="number-input-wrapper">
                            <input type="number" id="overtime_rate" name="overtime_rate" step="0.1" value="1.5" min="1">
                            <span class="unit">مرة</span>
                        </div>
                        <span class="input-hint">مثال: 1.5 تعني ساعة ونصف لكل ساعة إضافية</span>
                    </div>

                    <div class="input-group">
                        <label for="max_overtime">الحد الأقصى للأوفرتايم اليومي</label>
                        <div class="number-input-wrapper">
                            <input type="number" id="max_overtime" name="max_overtime" value="4" min="0">
                            <span class="unit">ساعات</span>
                        </div>
                    </div>

                    {{-- <div class="input-group">
                        <label>لون التمييز</label>
                        <div class="color-picker-grid">
                            <label class="color-option">
                                <input type="radio" name="color" value="blue" checked>
                                <span class="color-dot bg-blue"></span>
                            </label>
                            <label class="color-option">
                                <input type="radio" name="color" value="purple">
                                <span class="color-dot bg-purple"></span>
                            </label>
                            <label class="color-option">
                                <input type="radio" name="color" value="orange">
                                <span class="color-dot bg-orange"></span>
                            </label>
                            <label class="color-option">
                                <input type="radio" name="color" value="cyan">
                                <span class="color-dot bg-cyan"></span>
                            </label>
                            <label class="color-option">
                                <input type="radio" name="color" value="green">
                                <span class="color-dot bg-green"></span>
                            </label>
                        </div>
                    </div> --}}
                {{-- </div> --}}
            </div>
        </form>
    </div>
@endsection
