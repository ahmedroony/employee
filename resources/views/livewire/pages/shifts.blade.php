@extends('layouts.admin')

@section('title', 'إدارة الشفتات - TimeTrack')
@vite(['resources/css/admin/shifts.css'])
@section('content')
    <header class="top-header">
        <div class="header-right">
            <h1>إدارة الشفتات</h1>
            <p>3 شفتات نشطة — 24 موظف مُعيّن</p>
        </div>
        <div class="header-left">
            <a href="{{ route('Create.shifts') }}" wire:navigate class="btn btn-primary"><i class='bx bx-plus'></i> شفت جديد</a>
        </div>
    </header>

    <!-- Shifts Grid -->
    <div class="shifts-grid">

        <!-- Shift Card 1 -->
        <div class="shift-card border-blue">
            <div class="shift-header">
                <div class="shift-title">
                    <span class="dot blue"></span> شفت صباحي A
                </div>
            </div>

            <div class="shift-time-info">
                <span class="shift-time-label">بداية</span>
                <span class="shift-time-value text-green">08:00</span>
            </div>
            <div class="shift-time-info">
                <span class="shift-time-label">نهاية</span>
                <span class="shift-time-value text-red">16:00</span>
            </div>

            <div class="shift-divider"></div>

            <div class="shift-stats">
                <div class="shift-stats-right">
                    <div><span>12</span> موظف</div>
                    <div><span>8</span> ساعات عمل</div>
                </div>
                <div class="shift-stats-left">
                    <span>أوفرتايم:</span> <span class="text-orange">1.5x</span>
                </div>
            </div>

            <div class="shift-actions">
                <button class="btn btn-outline"><i class='bx bx-group'></i> الموظفين</button>
                <button class="btn btn-blue"><i class='bx bx-pencil'></i> تعديل</button>
            </div>
        </div>

        <!-- Shift Card 2 -->
        <div class="shift-card border-purple">
            <div class="shift-header">
                <div class="shift-title">
                    <span class="dot purple"></span> شفت مسائي B
                </div>
            </div>

            <div class="shift-time-info">
                <span class="shift-time-label">بداية</span>
                <span class="shift-time-value text-green">14:00</span>
            </div>
            <div class="shift-time-info">
                <span class="shift-time-label">نهاية</span>
                <span class="shift-time-value text-red">22:00</span>
            </div>

            <div class="shift-divider"></div>

            <div class="shift-stats">
                <div class="shift-stats-right">
                    <div><span>9</span> موظف</div>
                    <div><span>8</span> ساعات عمل</div>
                </div>
                <div class="shift-stats-left">
                    <span>أوفرتايم:</span> <span class="text-orange">1.5x</span>
                </div>
            </div>

            <div class="shift-actions">
                <button class="btn btn-outline"><i class='bx bx-group'></i> الموظفين</button>
                <button class="btn btn-blue"><i class='bx bx-pencil'></i> تعديل</button>
            </div>
        </div>

        <!-- Shift Card 3 -->
        <div class="shift-card border-orange">
            <div class="shift-header">
                <div class="shift-title">
                    <span class="dot orange"></span> شفت ليلي C
                </div>
            </div>

            <div class="shift-time-info">
                <span class="shift-time-label">بداية</span>
                <span class="shift-time-value text-green">22:00</span>
            </div>
            <div class="shift-time-info">
                <span class="shift-time-label">نهاية</span>
                <span class="shift-time-value text-red">06:00<span class="plus-one">+1</span></span>
            </div>

            <div class="shift-divider"></div>

            <div class="shift-stats">
                <div class="shift-stats-right">
                    <div><span>3</span> موظف</div>
                    <div><span>8</span> ساعات عمل</div>
                </div>
                <div class="shift-stats-left">
                    <span>أوفرتايم:</span> <span class="text-orange">2.0x</span>
                </div>
            </div>

            <div class="shift-actions">
                <button class="btn btn-outline"><i class='bx bx-group'></i> الموظفين</button>
                <button class="btn btn-blue"><i class='bx bx-pencil'></i> تعديل</button>
            </div>
        </div>

        <!-- Add New Shift Card -->
        <a href="" class="shift-card dashed-card">
            <i class='bx bx-plus'></i>
            <span>إضافة شفت جديد</span>
        </a>
    </div>

    <!-- Overtime Rules -->
    <div class="rules-section">
        <div class="rules-header">
            <i class='bx bxs-cog'></i> قواعد الأوفرتايم العامة
        </div>

        <div class="rules-list">
            <div class="rule-item">
                <span class="rule-label">الحساب يبدأ بعد نهاية الشفت بـ</span>
                <div class="rule-value">
                    <strong>0 دقيقة</strong>
                    <span class="badge-active">نشط</span>
                </div>
            </div>

            <div class="rule-item">
                <span class="rule-label">الحد الأقصى للأوفرتايم اليومي</span>
                <div class="rule-value">
                    <strong>4 ساعات</strong>
                    <span class="badge-active">نشط</span>
                </div>
            </div>

            <div class="rule-item">
                <span class="rule-label">الأوفرتايم في الإجازات</span>
                <div class="rule-value">
                    <strong>2.0x</strong>
                    <span class="badge-active">نشط</span>
                </div>
            </div>
        </div>
    </div>
@endsection
